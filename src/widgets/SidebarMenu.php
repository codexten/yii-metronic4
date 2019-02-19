<?php
/**
 * @copyright Copyright (c) 2014 icron.org
 * @license http://yii2metronic.icron.org/license.html
 */

namespace codexten\yii\metronic4\widgets;

use codexten\yii\metronic4\Theme;
use codexten\yii\web\widgets\Menu;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use Yii;
use yii\helpers\Url;
use yii\widgets\ActiveForm as CoreActiveForm;

/**
 * Metronic menu displays a multi-level menu using nested HTML lists.
 *
 * The main property of Menu is [[items]], which specifies the possible items in the menu.
 * A menu item can contain sub-items which specify the sub-menu under that menu item.
 *
 * Menu checks the current route and request parameters to toggle certain menu items
 * with active state.
 *
 * Note that Menu only renders the HTML tags about the menu. It does do any styling.
 * You are responsible to provide CSS styles to make it look like a real menu.
 *
 * The following example shows how to use Menu:
 *
 * ```php
 * echo Menu::widget([
 *     'items' => [
 *         // Important: you need to specify url as 'controller/action',
 *         // not just as 'controller' even if default action is used.
 *         [
 *           'icon' => '',
 *           'label' => 'Home',
 *           'url' => ['site/index']
 *         ],
 *         // 'Products' menu item will be selected as long as the route is 'product/index'
 *         ['label' => 'Products', 'url' => ['product/index'], 'items' => [
 *             ['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
 *             ['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
 *         ]],
 *         ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
 *     ],
 *     'search' => [
 *         // required, whether search box is visible. Defaults to 'true'.
 *         'visible' => true,
 *         // optional, the configuration array for [[ActiveForm]].
 *         'form' => [],
 *         // optional, input options with default values
 *         'input' => [
 *             'name' => 'search',
 *             'value' => '',
 *             'options' => [
 *             'placeholder' => 'Search...',
 *         ]
 *     ],
 * ]
 * ]);
 * ```
 *
 * @author Jomon Johnson <jomon@entero.in>
 */
class SidebarMenu extends Menu
{
    /**
     * @var string
     */
    public $linkTemplate = "<a href=\"{url}\">\n{icon}\n{label}\n{right-icon}\n{badge}</a>";

    public $subLinkTemplate = "<a href=\"{url}\">\n{icon}\n{label}\n{right-icon}\n{badge}</a>";

    /**
     * @var string
     */
    public $labelTemplate = "{icon}\n{label}\n{badge}";

    /**
     * @var string
     */
    public $badgeTag = 'span';
    /**
     * @var string
     */
    public $badgeClass = 'label pull-right';
    /**
     * @var string
     */
    public $badgeBgClass;

    /**
     * @var string
     */
    public $parentRightIcon = 'arrow';

    /**
     * @var boolean whether to activate parent menu items when one of the corresponding child menu items is active.
     * The activated parent menu items will also have its CSS classes appended with [[activeCssClass]].
     */
    public $activateParents = true;
    /**
     * @var array Search options
     * is an array of the following structure:
     * ```php
     * [
     *   // required, whether search box is visible
     *   'visible' => true,
     *   // optional, ActiveForm options
     *   'form' => [],
     *   // optional, input options with default values
     *   'input' => [
     *     'name' => 'search',
     *     'value' => '',
     *     'options' => [
     *       'placeholder' => 'Search...',
     *     ]
     *   ],
     * ]
     * ```
     */
    public $search = ['visible' => false];
    /**
     * @var bool Indicates whether menu is visible.
     */
    public $visible = true;

    public function __construct(array $config = [])
    {
        $config = ArrayHelper::merge([
            'options' => [
                'class' => 'page-sidebar-menu page-header-fixed page-sidebar-menu-closed ',
                'data-keep-expanded' => 'false',
                'data-auto-scroll' => 'true',
                'data-slide-speed' => '200',
            ],
            'activateParents' => true,
            'itemOptions' => ['class' => 'nav-item',],
            'activeCssClass' => 'active open',
            'firstItemCssClass' => 'start',
            'submenuTemplate' => "\n<ul class=\"sub-menu\">\n{items}\n</ul>\n",
            'linkTemplate' => "<a href=\"{url}\" class=\"nav-link nav-toggle\">\n{icon}\n<span class=\"title\">{label}\n{badge}
                               </span><span class=\"selected\"></span>{right-icon}</a>",
        ], $config);
        parent::__construct($config);
    }


    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'page-sidebar-menu');
        if (!$this->visible || Theme::getComponent()->layoutOption == Theme::LAYOUT_FLUID) {
            Html::addCssClass($this->options, 'visible-sm visible-xs');
        }
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::beginTag('div', ['class' => 'page-sidebar navbar-collapse collapse']);
        if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = $_GET;
        }
        $items = $this->normalizeItems($this->items, $hasActiveChild);
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'ul');
        $data = [Html::tag('li', Html::tag('div', '', ['class' => 'sidebar-toggler hidden-phone']))];

        if (!isset($this->search['visible'])) {
            throw new InvalidConfigException("The 'visible' option of search is required.");
        }
        if ($this->search['visible']) {
            $data[] = Html::tag('li', $this->renderSearch());
        }

        $data[] = $this->renderItems($items);
        echo Html::tag($tag, implode("\n", $data), $options);
        echo Html::endTag('div');
    }

    /**
     * Renders search box
     *
     * @return string the rendering result
     */
    public function renderSearch()
    {
        $defaultFormOptions = ['options' => ['class' => 'sidebar-search']];
        $defaultInputOptions = ['name' => 'search', 'value' => '', 'options' => ['placeholder' => 'Search...']];
        $formOptions = ArrayHelper::merge(ArrayHelper::getValue($this->search, 'form', []), $defaultFormOptions);
        $inputOptions = ArrayHelper::merge(ArrayHelper::getValue($this->search, 'input', []), $defaultInputOptions);
        ob_start();
        ob_implicit_flush(false);
        CoreActiveForm::begin($formOptions);
        echo '<div class="form-container">';
        echo '<div class="input-box">';
        echo '<a href="#" class="remove"></a>';
        echo Html::input('text', $inputOptions['name'], $inputOptions['value'], $inputOptions['options']);
        echo '<input type="button" class="submit">';
        echo '</div>';
        echo '</div>';
        CoreActiveForm::end();

        return ob_get_clean();
    }

    /**
     * @inheritdoc
     */
    protected function renderItem($item)
    {
        $item['badgeOptions'] = isset($item['badgeOptions']) ? $item['badgeOptions'] : [];

        if (!ArrayHelper::getValue($item, 'badgeOptions.class')) {
            $bg = isset($item['badgeBgClass']) ? $item['badgeBgClass'] : $this->badgeBgClass;
            $item['badgeOptions']['class'] = $this->badgeClass . ' ' . $bg;
        }

        if (isset($item['items']) && !isset($item['right-icon'])) {
            $item['right-icon'] = $this->parentRightIcon;
            $item['itemOptions'] = Html::addCssClass($item['itemOptions'], 'nav-toggle');
        }

        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

            return strtr($template, [
                '{badge}' => isset($item['badge'])
                    ? Html::tag('small', $item['badge'], $item['badgeOptions'])
                    : '',
                '{icon}' => $this->icon($item),
                '{right-icon}' => $this->icon($item, 'right-icon'),
                '{url}' => Url::to($item['url']),
                '{label}' => '<span class="title">' . $item['label'] . '</span>',
            ]);
        }

        $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

        return strtr($template, [
            '{badge}' => isset($item['badge'])
                ? Html::tag('small', $item['badge'], $item['badgeOptions'])
                : '',
            '{icon}' => $this->icon($item),
            '{right-icon}' => $this->icon($item, 'right-icon'),
            '{label}' => $item['label'],
        ]);
    }

    protected function icon($item, $key = 'icon')
    {
        return isset($item[$key]) ? Html::tag('i', '', ['class' => $item[$key]]) : '';
    }

    /**
     * @inheritdoc
     */
    protected function normalizeItems($items, &$active)
    {
        foreach ($items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                unset($items[$i]);
                continue;
            }
            if (!isset($item['label'])) {
                $item['label'] = '';
            }
            $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
            $items[$i]['label'] = $encodeLabel ? Html::encode($item['label']) : $item['label'];
            $hasActiveChild = false;
            if (isset($item['items'])) {
                $item[$i]['template'] = $this->submenuTemplate;
                $items[$i]['items'] = $this->normalizeItems($item['items'], $hasActiveChild);
                if (empty($items[$i]['items']) && $this->hideEmptyItems) {
                    unset($items[$i]['items']);
                    if (!isset($item['url'])) {
                        unset($items[$i]);
                        continue;
                    }
                }
            }
            if (!isset($item['active'])) {
                if ($this->activateParents && $hasActiveChild || $this->activateItems && $this->isItemActive($item)) {
                    $active = $items[$i]['active'] = true;
                } else {
                    $items[$i]['active'] = false;
                }
            } elseif ($item['active']) {
                $active = true;
            }
        }

        return array_values($items);
    }

//    /**
//     * Recursively renders the menu items (without the container tag).
//     *
//     * @param array $items the menu items to be rendered recursively
//     * @param integer $level the item level, starting with 1
//     *
//     * @return string the rendering result
//     */
//    protected function renderItems($items, $level = 1)
//    {
//        $n = count($items);
//        $lines = [];
//        foreach ($items as $i => $item) {
//            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
//            $tag = ArrayHelper::remove($options, 'tag', 'li');
//            $class = [];
//            if ($item['active']) {
//                $class[] = $this->activeCssClass;
//            }
//            if ($i === 0 && $this->firstItemCssClass !== null) {
//                $class[] = $this->firstItemCssClass;
//            }
//            if ($i === $n - 1 && $this->lastItemCssClass !== null) {
//                $class[] = $this->lastItemCssClass;
//            }
//            if (!empty($class)) {
//                if (empty($options['class'])) {
//                    $options['class'] = implode(' ', $class);
//                } else {
//                    $options['class'] .= ' ' . implode(' ', $class);
//                }
//            }
//
//            // set parent flag
//            $item['level'] = $level;
//            $menu = $this->renderItem($item);
//            if (!empty($item['items'])) {
//                $menu .= strtr($this->submenuTemplate, [
//                    '{items}' => $this->renderItems($item['items'], $level + 1),
//                ]);
//            }
//            $lines[] = Html::tag($tag, $menu, $options);
//        }
//
//        return implode("\n", $lines);
//    }
//
//    /**
//     * Renders the content of a menu item.
//     * Note that the container and the sub-menus are not rendered here.
//     *
//     * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
//     *
//     * @return string the rendering result
//     */
//    protected function renderItem($item)
//    {
//        $icon = isset($item['icon']) ? Html::tag('i', '', ['class' => $item['icon']]) : '';
//        $label = ($item['level'] == 1) ?
//            Html::tag('span', $item['label'], ['class' => 'title']) : (' ' . $item['label']);
//        $arrow = !empty($item['items']) ?
//            Html::tag('span', '', ['class' => 'arrow' . ($item['active'] ? ' open' : '')]) : '';
//
//        if ($item['active'] && $item['level'] == 1) {
//            $arrow = Html::tag('div', '', ['class' => 'selected']) . $arrow;
//        }
//        $badge = ArrayHelper::getValue($item, 'badge', '');
//        if (isset($item['url'])) {
//            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
//
//            return strtr($template, [
//                '{url}' => Url::toRoute($item['url']),
//                '{label}' => $label,
//                '{icon}' => $icon,
//                '{arrow}' => $arrow,
//                '{badge}' => $badge,
//            ]);
//        } else {
//            $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);
//
//            return strtr($template, [
//                '{label}' => $label,
//                '{icon}' => $icon,
//                '{arrow}' => $arrow,
//                '{badge}' => $badge,
//            ]);
//        }
//    }
}