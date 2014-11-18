Yii2 Ip Behavior
================

Yii2 Behavior that records User IP address on Updates/Inserts

Installation
------------
Put the IpBehavior.php file into the app\behaviors folder or any other folder (just don't forget to modify the namespace then).

Configuring
--------------------------
You can call it like this.

```php
public function behaviors() {
        return [
            ...
            'userIp' => [
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
            'userIp' => [
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


