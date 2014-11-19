<?php

/**
 * @link https://github.com/ruskid/yii2-ip-behavior
 * @copyright Copyright (c) 2014 Victor Demin
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace ruskid\YiiBehaviors;

use yii\behaviors\AttributeBehavior;
use yii\db\BaseActiveRecord;

/**
 * @author Victor Demin <demmbox@gmail.com>
 * inspired by TimestampBehavior
 */
class IpBehavior extends AttributeBehavior {

    /**
     * @var string the attribute that will receive IP value on create.
     * Set to false if you do not want record it
     */
    public $createdIpAttribute = 'created_ip';

    /**
     * @var string the attribute that will receive IP value on update.
     * Set to false if you do not want record it
     */
    public $updatedIpAttribute = 'updated_ip';

    /**
     * @var null|string
     * This can be the value to record.  If not set, it will use the value of `\Yii::$app->request->userIp` 
     * to set the attributes. NOTE! Null is returned if the user IP address cannot be detected.
     */
    public $value;

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => [$this->createdIpAttribute, $this->updatedIpAttribute],
                BaseActiveRecord::EVENT_BEFORE_UPDATE => $this->updatedIpAttribute,
            ];
        }
    }

    /**
     * @inheritdoc
     */
    protected function getValue($event) {
        return $this->value !== null ? $this->value : \Yii::$app->request->userIp;
    }

    /**
     * Sets an IP address to the attribute.
     * 
     * ```php
     * $model->setIp('updated_ip');
     * ```
     * @param string $attribute the name of the attribute to update.
     */
    public function setIp($attribute) {
        $this->owner->updateAttributes(array_fill_keys((array) $attribute, $this->getValue(null)));
    }

}
