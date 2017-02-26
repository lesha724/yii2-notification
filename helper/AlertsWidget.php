<?php

namespace lesha724\Notification\helper;

class AlertsWidget extends \yii\bootstrap\Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     */
    public $alertTypes;

    /**
     * @var boolean whether to removed flash messages during AJAX requests
     */
    public $isAjaxRemoveFlash = true;

    public function run()
    {
        parent::run();

        $this->_run();
    }

    protected function _run(){
        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();
        $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $data) {

            if (isset($this->alertTypes[$type])) {
                $data = (array) $data;
                foreach ($data as $message) {
                    $this->_runAlert($data, $type, $message, $appendCss);
                }
                if ($this->isAjaxRemoveFlash && !\Yii::$app->request->isAjax) {
                    $session->removeFlash($type);
                }
            }
        }
    }

    protected function _runAlert($data, $type, $message,$appendCss){

    }
}