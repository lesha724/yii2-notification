<?php

namespace lesha724\Notification;

use yii\bootstrap\Alert;
use yii\bootstrap\Widget;

/**
 * Bootstrap alert
 */
class BootstrapAlert extends Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the array:
     *       - class of alert type (i.e. danger, success, info, warning)
     *       - icon for alert
     */
    public $alertTypes = [
        'error' => [
            'class' => 'alert-danger',
            'icon' => '<i class="icon glyphicon glyphicon-ban-circle"></i>',
        ],
        'danger' => [
            'class' => 'alert-danger',
            'icon' => '<i class="icon glyphicon glyphicon-ban-circle"></i>',
        ],
        'success' => [
            'class' => 'alert-success',
            'icon' => '<i class="icon glyphicon glyphicon-ok"></i>',
        ],
        'info' => [
            'class' => 'alert-info',
            'icon' => '<i class="icon glyphicon glyphicon-exclamation-sign"></i>',
        ],
        'warning' => [
            'class' => 'alert-warning',
            'icon' => '<i class="icon glyphicon glyphicon-warning-sign"></i>',
        ],
    ];

    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];
    /**
     * @var string prefix for type of flash messages
     */
    public $prefix = '';

    /**
     * @var boolean whether to removed flash messages during AJAX requests
     */
    public $isAjaxRemoveFlash = true;

    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();

        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();
        $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $data) {
            if (isset($this->alertTypes[$this->prefix . $type])) {
                $data = (array) $data;
                foreach ($data as $message) {

                    $this->options['class'] = $this->alertTypes[$type]['class'] . $appendCss;

                    $this->options['id'] = $this->getId() . '-' . $type;

                    echo Alert::widget([
                        'body' => $this->alertTypes[$type]['icon'] . $message,
                        'closeButton' => $this->closeButton,
                        'options' => $this->options,
                    ]);
                }
                if ($this->isAjaxRemoveFlash && !\Yii::$app->request->isAjax) {
                    $session->removeFlash($type);
                }
            }
        }
    }
}
