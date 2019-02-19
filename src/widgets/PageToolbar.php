<?php
/**
 * @link https://entero.co.in/
 * @copyright Copyright (c) 2012 Entero Software Solutions Pvt.Ltd
 * @license https://entero.co.in/license/
 */

namespace codexten\yii\metronic4\widgets;

use entero\helpers\ArrayHelper;
use entero\helpers\Html;
use Yii;

/**
 * Class PageToolBar
 *
 * @package codexten\yii\metronic4\widgets
 * @author Ashlin A <ashlin@entero.in>
 * @author Jomon Johnson <jomon@entero.in>
 */
class PageToolbar extends \codexten\yii\web\widgets\ButtonGroup
{
    /**
     * @var string
     */
    public $template = '{save}{clone}{create}{reset}{cancel}{delete}';
    /**
     * @var array
     */
    public $params = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (isset($this->params['template'])) {
            $this->template = $this->params['template'];
            unset($this->params['template']);
        }

        $this->items = $this->params ? ArrayHelper::merge($this->defaultItems(), $this->params) : [];
        $this->normalize();
    }

    /**
     * @return array
     */
    protected function defaultItems()
    {
        return [
            'save' => [
                'label' => Yii::t('codexten:metronic4', 'Save'),
                'icon' => '<i class="fa fa-save"></i>',
                'class' => 'btn btn-xs green',
            ],
            'clone' => [
                'label' => Yii::t('codexten:metronic4', 'Clone'),
                'icon' => '<i class="fa fa-copy"></i>',
                'class' => 'btn btn-xs purple',
            ],
            'create' => [
                'label' => Yii::t('codexten:metronic4', 'Create'),
                'icon' => '<i class="fa fa-plus"></i>',
                'url' => 'create',
                'class' => 'btn btn-xs blue',
            ],
            'reset' => [
                'label' => Yii::t('codexten:metronic4', 'Reset'),
                'icon' => '<i class="fa fa-refresh"></i>',
                'class' => 'btn btn-xs default',
            ],
            'cancel' => [
                'label' => Yii::t('codexten:metronic4', 'Back'),
                'icon' => '<i class="fa fa-reply"></i>',
                'url' => 'cancel',
                'class' => 'btn btn-xs dark',
            ],
            'delete' => [
                'label' => Yii::t('codexten:metronic4', 'Delete'),
                'title' => Yii::t('codexten:metronic4', 'Delete'),
                'icon' => '<i class="fa fa-trash"></i>',
                'url' => 'delete',
                'class' => 'btn btn-xs red',
                'method' => 'post',
                'confirm' => Yii::t('codexten:metronic4', 'Are you sure you want to delete this item?'),
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    protected function normalize()
    {
        $items = [];
        preg_match_all("/\{([a-zA-Z0-9]+)\}/", $this->template, $templates);

        foreach ($templates[1] as $template) {
            if (isset($this->items[$template])) {
                $items[$template] = $this->items[$template];
            }
        }

        foreach ($items as $key => $item) {
            $form = ArrayHelper::getValue($item, 'form');
            if ($key == 'reset' && $form) {
                $item['options']['onClick'] = "$('#{$form}').trigger('reset');";
                unset($item['form']);
                $items[$key] = $item;
            }
        }

        $this->items = $items;
        parent::normalize();
    }
}