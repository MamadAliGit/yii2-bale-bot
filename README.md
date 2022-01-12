Bale Bot Extension
==================
[Bale bot api docs](https://devbale.ir/api)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist mamadali/yii2-bale-bot "*"
```

or add
```
"mamadali/yii2-bale-bot": "*"
```

to the require section of your `composer.json` file.
 
Usage
-----
First create your bot in @botfateher in [bale messanger](https://bale.ai) and get bot token

Then add this code to components section of config.php or if use advanced project common/config/main.php

```php
    'components' => [
        ...
        'bale' => [
            'class' => 'mamadali\bale\Bale',
            'botToken' => '<Enter your bot token here>',
        ],
        ...
    ];
```

Once the extension is installed, simply use it in your code by :

```php
<?= Yii::$app->bale->sendMessage([
        'chat_id' => '<Enter chat id here>',
        'text' => 'test',
    ]); ?>

```

Usable methods list
-----

```php
sendMessage
sendPhoto
sendAudio
sendDocument
sendVideo
```