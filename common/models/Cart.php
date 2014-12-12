<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $good_id
 * @property integer $qty
 * @property string $size
 * @property string $type
 * @property integer $time_to_send_letter
 */
class Cart extends \yii\db\ActiveRecord
{
    public static $types = [
        1 => 'concept',
        2 => 'acoola',
        3 => 'inflin',
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'good_id', 'qty', 'size', 'type'], 'required'],
            [['user_id', 'qty', 'time_to_send_letter'], 'integer'],
            [['good_id', 'type'], 'string', 'max' => 50],
            [['size'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'good_id' => 'Good ID',
            'qty' => 'Qty',
            'size' => 'Size',
            'type' => 'Type',
            'time_to_send_letter' => 'Time To Send Letter',
        ];
    }

    public function beforeSave()
    {
        $cartItem = Cart::find()->where(['user_id' => $this->user_id, 'good_id' => $this->good_id, 'size' => $this->size])->one();

        if($cartItem)
            return false;
        else
            return true;
    }
}
