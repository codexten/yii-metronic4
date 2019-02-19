<?php
/**
 * Created by PhpStorm.
 * User: jomon
 * Date: 8/2/18
 * Time: 1:04 PM
 */

namespace codexten\yii\metronic4;


use codexten\yii\metronic4\bundles\IonRangeSliderAsset;
use codexten\yii\metronic4\bundles\ThemeAsset;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\web\AssetBundle;

class Theme extends \entero\web\Theme
{
    /**
     * @var AssetBundle
     */
    public static $assetsBundle;

    /**
     * Theme
     */
    const LAYOUT_1 = 'layout';
    const LAYOUT_2 = 'layout2';
    const LAYOUT_3 = 'layout3';
    const LAYOUT_4 = 'layout4';
    const LAYOUT_5 = 'layout5';
    const LAYOUT_6 = 'layout6';
    const LAYOUT_7 = 'layout7';

    /**
     * Login Page
     */
    const LOGIN_PAGE_1 = 'login';
    const LOGIN_PAGE_2 = 'login-2';
    const LOGIN_PAGE_3 = 'login-3';
    const LOGIN_PAGE_4 = 'login-4';
    const LOGIN_PAGE_5 = 'login-5';

    /**
     * Theme
     */
    const THEME_DARK = 'default';
    const THEME_LIGHT = 'light';

    /**
     * Style
     */
    const STYLE_SQUARE = 'default';
    const STYLE_ROUNDED = 'rounded';
    const STYLE_MATERIAL = 'material';

    /**
     * Layout
     */
    const LAYOUT_FLUID = 'default';
    const LAYOUT_BOXED = 'boxed';

    /**
     * Header
     */
    const HEADER_DEFAULT = 'default';
    const HEADER_FIXED = 'fixed';

    /**
     * Header Dropdowns
     */
    const HEADER_DROPDOWN_DARK = 'dark';
    const HEADER_DROPDOWN_LIGHT = 'light';

    /**
     * Sidebar
     */
    const SIDEBAR_DEFAULT = 'default';
    const SIDEBAR_FIXED = 'fixed';

    /**
     * Sidebar menu
     */
    const SIDEBAR_MENU_ACCORDION = 'accordion';
    const SIDEBAR_MENU_HOVER = 'hover';

    /**
     * Sidebar position
     */
    const SIDEBAR_POSITION_LEFT = 'left';
    const SIDEBAR_POSITION_RIGHT = 'right';

    /**
     * Footer
     */
    const FOOTER_DEFAULT = 'default';
    const FOOTER_FIXED = 'fixed';

    /**
     * Search string
     */
    const PARAM_LAYOUT = '{version}';
    const PARAM_THEME = '{theme}';

    /**
     * UI Colors blue
     */
    const UI_COLOR_BLUE = 'blue';
    const UI_COLOR_BLUE_HOKI = 'blue-hoki';
    const UI_COLOR_BLUE_STEEL = 'blue-steel';
    const UI_COLOR_BLUE_MADISON = 'blue-madison';
    const UI_COLOR_BLUE_CHAMBRAY = 'blue-chambray';
    const UI_COLOR_BLUE_EBONYCLAY = 'blue-ebonyclay';

    /**
     * UI Colors green
     */
    const UI_COLOR_GREEN = 'green';
    const UI_COLOR_GREEN_MEADOW = 'green-meadow';
    const UI_COLOR_GREEN_SEAGREEN = 'green-seagreen';
    const UI_COLOR_GREEN_TORQUOISE = 'green-torquoise';
    const UI_COLOR_GREEN_JUNGLE = 'green-jungle';
    const UI_COLOR_GREEN_HAZE = 'green-haze';

    /**
     * UI Colors red
     */
    const UI_COLOR_RED = 'red';
    const UI_COLOR_RED_PINK = 'red-pink';
    const UI_COLOR_RED_SUNGLO = 'red-sunglo';
    const UI_COLOR_RED_INTENSE = 'red-intense';
    const UI_COLOR_RED_THUNDERBIRD = 'red-thunderbird';
    const UI_COLOR_RED_FLAMINGO = 'red-flamingo';
    const UI_COLOR_RED_HAZE = 'red-haze';

    /**
     * UI Colors yellow
     */
    const UI_COLOR_YELLOW = 'yellow';
    const UI_COLOR_YELLOW_GOLD = 'yellow-gold';
    const UI_COLOR_YELLOW_CASABLANCA = 'yellow-casablanca';
    const UI_COLOR_YELLOW_CRUSTA = 'yellow-crusta';
    const UI_COLOR_YELLOW_LEMON = 'yellow-lemon';
    const UI_COLOR_YELLOW_SAFFRON = 'yellow-saffron';

    /**
     * UI Colors purple
     */
    const UI_COLOR_PURPLE = 'purple';
    const UI_COLOR_PURPLE_PLUM = 'purple-plum';
    const UI_COLOR_PURPLE_MEDIUM = 'purple-medium';
    const UI_COLOR_PURPLE_STUDIO = 'purple-studio';
    const UI_COLOR_PURPLE_WISTERIA = 'purple-wisteria';
    const UI_COLOR_PURPLE_SEANCE = 'purple-seance';

    /**
     * UI Colors grey
     */
    const UI_COLOR_GREY = 'grey';
    const UI_COLOR_GREY_CASCADE = 'grey-cascade';
    const UI_COLOR_GREY_SILVER = 'grey-silver';
    const UI_COLOR_GREY_STEEL = 'grey-steel';
    const UI_COLOR_GREY_CARARRA = 'grey-cararra';
    const UI_COLOR_GREY_GALLERY = 'grey-gallery';

    /**
     * Classes paths
     */
    const CLASS_HTML = '@eii/metronic/helpers/Html.php';

    /**
     * @var bool
     */
    public $isEnabled = false;
    /**
     * @var array
     */
    public $topBar = [
        'notification' => [
            'visible' => false,
        ],
        'inbox' => [
            'visible' => false,
        ],
        'todo' => [
            'visible' => false,
        ],
        'userDropdown' => [
            'visible' => true,
        ],
    ];
    /**
     * @var bool
     */
    public $showPageBar = true;
    /**
     * @var bool
     */
    public $showPageTitle = true;
    /**
     * @var bool
     */
    public $showThemePanel = false;
    /**
     * @var bool
     */
    public $showQuickSidebar = false;
    /**
     * @var bool
     */
    public $showFooter = true;
    /**
     * @var array
     */
    public $sidebarMenuConfig = [
        'visible' => true,
    ];
    public $footerConfig = [
        'visible' => true,
    ];
    /**
     * @var string
     */
    public $layoutPath = '@codexten/yii/metronic4/layouts';
    /**
     * @var string
     */
    public $loginPage;
    /**
     * @var string version
     */
    public $layout = self::LAYOUT_1;
    /**
     * @var string Theme
     */
    public $theme = self::THEME_DARK;
    /**
     * @var string Theme style
     */
    public $style = self::STYLE_ROUNDED;
    /**
     * @var string Layout mode
     */
    public $layoutOption = self::LAYOUT_BOXED;
    /**
     * @var string Header display
     */
    public $headerOption = self::HEADER_FIXED;
    /**
     * @var string Header dropdowns
     */
    public $headerDropdown = self::HEADER_DROPDOWN_DARK;
    /**
     * @var string Sidebar display
     */
    public $sidebarOption = self::SIDEBAR_DEFAULT;
    /**
     * @var string Sidebar display
     */
    public $sidebarMenu = self::SIDEBAR_MENU_ACCORDION;
    /**
     * @var string Sidebar position
     */
    public $sidebarPosition = self::SIDEBAR_POSITION_LEFT;
    /**
     * @var string Footer display
     */
    public $footerOption = self::FOOTER_DEFAULT;
    /** @var string IonRangeSlider skin */
    public $ionSliderSkin = IonRangeSliderAsset::SKIN_SIMPLE;
    /**
     * @var array resources paths
     */
    public $resources = '@ui/admin/theme/metronic/asset';
    /**
     * @var string Component name used in the application
     */
    public static $componentName = 'metronic';

    /**
     * @param \yii\base\Application $app
     *
     * @return bool
     */
    public function bootstrap($app)
    {
//        if (!$this->isEnabled) {
//            return false;
//        }
//
//        $app->setLayoutPath($this->layoutPath);
    }

    /**
     * Inits module
     */
    public function init()
    {
        parent::init();

        if (self::SIDEBAR_FIXED === $this->sidebarOption && self::SIDEBAR_MENU_HOVER === $this->sidebarMenu) {
            throw new InvalidConfigException('Hover Sidebar Menu is not compatible with Fixed Sidebar Mode. Select Default Sidebar Mode Instead.');
        }

        if (!$this->resources) {
            throw new InvalidConfigException('You have to specify resources locations to be able to create symbolic links. Specify "admin" and "global" theme folder locations.');
        }
        $this->resources = Yii::$app->params['metronic4.asset.path'];

        if ($this->topBar['userDropdown']['visible'] && empty(ArrayHelper::getValue($this->topBar['userDropdown'],
                'items', []))) {
            $this->topBar['userDropdown']['items'] = [
                [
                    'label' => Yii::t('codexten:metronic4', '{icon} My Profile',
                        ['icon' => '<i class="icon-user"></i>']),
                    'url' => '#',
                ],
                [
                    'label' => Yii::t('codexten:metronic4', '{icon} My Calendar',
                        ['icon' => '<i class="icon-calendar"></i>']),
                    'url' => '#',
                ],
                [
                    'label' => Yii::t('codexten:metronic4', '{icon} My Inbox {badge}',
                        [
                            'icon' => '<i class="icon-envelope-open"></i>',
                            'badge' => '<span class="badge badge-danger"> 3 </span>',
                        ]),
                    'url' => '#',
                ],
                [
                    'label' => Yii::t('codexten:metronic4', '{icon} My Tasks {badge}',
                        [
                            'icon' => '<i class="icon-rocket"></i>',
                            'badge' => '<span class="badge badge-success"> 7 </span>',
                        ]),
                    'url' => '#',
                ],
                [
                    'label' => Yii::t('codexten:metronic4', '{icon} Lock Screen',
                        ['icon' => '<i class="icon-lock"></i>']),
                    'url' => '#',
                ],
                [
                    'label' => Yii::t('codexten:metronic4', '{icon} Log Out', ['icon' => '<i class="icon-key"></i>']),
                    'url' => ['/sign-in/logout'],
                    'linkOptions' => [
                        'data-method' => 'post',
                    ],
                ],
            ];
        }
        if ($this->loginPage === null) {
            $this->loginPage = self::LOGIN_PAGE_1;
        }
    }

    public function parseAssetsParams(&$string)
    {
        if (preg_match('/\{[a-z]+\}/', $string)) {
            $string = str_replace(static::PARAM_LAYOUT, $this->layout, $string);

            $string = str_replace(static::PARAM_THEME, $this->theme, $string);
        }
    }


    /**
     * Get base url to metronic assets
     *
     * @param $view View
     *
     * @return string
     */
    public static function getAssetsUrl($view)
    {
        if (static::$assetsBundle === null) {
            static::$assetsBundle = static::registerThemeAsset($view);
        }

        return (static::$assetsBundle instanceof AssetBundle) ? static::$assetsBundle->baseUrl : '';
    }

    /**
     * Register Theme Asset
     *
     * @param $view View
     *
     * @return AssetBundle
     */
    public static function registerThemeAsset($view)
    {
        return static::$assetsBundle = ThemeAsset::register($view);
    }
}