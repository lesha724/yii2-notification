Notifiaction in yii2 
=====================
Notifiaction in yii2:
    [bootstrap alerts](http://getbootstrap.com/components/#alerts),
    [sweet alerts](http://t4t5.github.io/sweetalert),
    [noty](http://ned.im/noty/)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist lesha724/yii2-notification "*"
```

or add

```
"lesha724/yii2-notification": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

**Bootstrap Alerts**

_Fork from [dmstr\widgets\Alert](https://github.com/dmstr/yii2-adminlte-asset/blob/master/widgets/Alert.php)_
1) Set the message in your action, for example:

```php
<?php 
    Yii::$app->session->setFlash('success', 'This is the message');
?>
```

2) Simply add widget to your page as follows:

```php
<?= \lesha724\Notification\BootstrapAlert::widget([
        'alertTypes' => [
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
        ],
        'closeButton'=>[],
]); ?>
```