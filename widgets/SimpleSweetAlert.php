<?php

namespace lesha724\Notification\widgets;


use lesha724\Notification\assets\SweetAlertAssets;
use yii\bootstrap\Widget;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * Class SimpleSweetAlert simple widget sweet alert
 * @package lesha724\Notification\widgets
 */
class SimpleSweetAlert extends Widget
{
    public function init()
    {
        parent::init();

        $this->view->registerAssetBundle(SweetAlertAssets::className());
    }

    public function run()
    {
        parent::run();

        $this->_run();
    }

    protected function _run(){
        //ArrayHelper::remove($options,'function');
        $options = $this->options;

        unset($options['function']);

        $options = Json::encode($options);

        if(isset($this->options['function']) && !empty($this->options['function'])) {
            $function = new JsExpression($this->options['function']);
            $options.=','.$function;
        }

        $js = <<<JS
            swal(
                {$options}
            );
JS;
        $this->view->registerJs($js,\yii\web\View::POS_END);
    }
}