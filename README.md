Yii2 Ip Behavior
================

Yii2 Behavior that records User IP address on Updates/Inserts

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```sh
php composer.phar require ruskid/yii2-ip-behavior "dev-master"
```

or add

```json
"ruskid/yii2-ip-behavior": "dev-master"
```

to the require section of your `composer.json` file.

Or
------------
I wanted to test the composer xd. You can just copy paste IpBehavior.php to behaviors folder or any folder you like. (just don't forget to change the namespace).

Usage
--------------------------
You can call it like this.

```php
public function behaviors() {
        return [
            ...
            'ip' => [
                'class' => IpBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_ip', 'updated_ip'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_ip',
                ],
            ]
            ...
        ];
    }
```

Or like this. where value can be a string or an anonymous function that will return a string.
```php
public function behaviors() {
        return [
            ...
            'ip' => [
                'class' => IpBehavior::className(),
                'createdIpAttribute' => 'created_ip',
                'updatedIpAttribute' => 'updated_ip',
                'value' => '127.0.0.1',
            ]
            ...
        ];
    }
```

Extras
--------------------------
this will set user's IP address to the attribute of the model.
```php
$user->setIp('updated_ip');
```


