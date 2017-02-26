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



Bootstrap Alerts
-----

Once the extension is installed, simply use it in your code by  :

1) Set the message in your action, for example:

```php
<?php  
    Yii::$app->session->setFlash('bootstrap-success', 'This is the message');
?>
```

2) Simply add widget to your page as follows:

```php
<?= \lesha724\Notification\widgets\BootstrapAlert::widget([
        'alertTypes' => [
            'bootstrap-error' => [
                'class' => 'alert-danger',
                'icon' => '<i class="icon glyphicon glyphicon-ban-circle"></i>',
            ],
            'bootstrap-danger' => [
                'class' => 'alert-danger',
                'icon' => '<i class="icon glyphicon glyphicon-ban-circle"></i>',
            ],
            'bootstrap-success' => [
                'class' => 'alert-success',
                'icon' => '<i class="icon glyphicon glyphicon-ok"></i>',
            ],
            'bootstrap-info' => [
                'class' => 'alert-info',
                'icon' => '<i class="icon glyphicon glyphicon-exclamation-sign"></i>',
            ],
            'bootstrap-warning' => [
                'class' => 'alert-warning',
                'icon' => '<i class="icon glyphicon glyphicon-warning-sign"></i>',
            ],
        ],
        'closeButton'=>[],
]); ?>
```

SweetAlerts
---

**Widget for flash messages**
1) Set the message in your action, for example:

```php
<?php  
    Yii::$app->session->setFlash('sweeat-alert-success', 'This is the message');
?>
```

2) Simply add widget to your page as follows:

```php
<?= \lesha724\Notification\widgets\SweetAlert::widget([
        'alertTypes' => [
            'sweet-alert-error' => [
                //you can use all options from http://t4t5.github.io/sweetalert/
                'type' => 'error',
                'title' => 'Error!',
                /* function use example:
                 * function(isConfirm){
                     if (isConfirm) {
                       swal("Deleted!", "Your imaginary file has been deleted.", "success");
                     } else {
                       swal("Cancelled", "Your imaginary file is safe :)", "error");
                     }
                   }
                 */
                
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
        ],
]); ?>
```

**Simple widget**
```php
<?php
            $function = <<<JS
                function(isConfirm){
                  if (isConfirm) {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                  } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                  }
                }
JS;

            echo \lesha724\Notification\widgets\SimpleSweetAlert::widget([
                'options'=>[
                    //you can use all options from http://t4t5.github.io/sweetalert/
                                    
                    'title'=> "Are you sure?",
                    'text'=> "You will not be able to recover this imaginary file!",
                    'type'=> "warning",
                    'showCancelButton'=> true,
                    'confirmButtonColor'=> "#DD6B55",
                    'confirmButtonText'=> "Yes, delete it!",
                    'cancelButtonText'=> "No, cancel plx!",
                    'closeOnConfirm'=> false,
                    'closeOnCancel'=> false,
                    'function'=>$function
                ]
        ]) ?>
```
