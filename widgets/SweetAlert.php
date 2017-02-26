<?php

namespace lesha724\Notification\widgets;


use lesha724\Notification\assets\SweetAlertAssets;
use lesha724\Notification\helper\AlertsWidget;
use yii\base\View;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * Class SweetAlert widget for flash messages
 * @package lesha724\Notification\widgets
 */
class SweetAlert extends AlertsWidget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the array:
     *       - type of alert type (i.e. error, success, info, warning)
     *       - title for alert
     *          http://t4t5.github.io/sweetalert/ options
     *
     *      -function
     */
    public $alertTypes = [
        'sweet-alert-error' => [
            'type' => 'error',
            'title' => 'Error!',
            'function' => null
        ],
        'sweet-alert-success' => [
            'type' => 'success',
            'title' => 'Success!',
            'function' => null
        ],
        'sweet-alert-info' => [
            'type' => 'info',
            'title' => 'Info!',
            'function' => null
        ],
        'sweet-alert-warning' => [
            'type' => 'warning',
            'title' => 'Warning!',
            'function' => null
        ],
    ];

    public function init()
    {
        parent::init();
    }

    public function run(){
        parent::run();
    }

    protected function _runAlert($data, $type, $message, $appendCss)
    {
        parent::_runAlert($data, $type, $message, $appendCss); // TODO: Change the autogenerated stub

        $options = ArrayHelper::merge($this->alertTypes[$type],['text'=>$message]);

        echo SimpleSweetAlert::widget([
            'options'=>$options
        ]);
    }
}