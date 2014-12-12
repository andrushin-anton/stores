<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "mail_queue".
 *
 * @property integer $id
 * @property string $target_email
 * @property string $from_email
 * @property string $subject
 * @property string $body
 * @property string $params
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class MailQueue extends \yii\db\ActiveRecord
{
    const STATUS_WAITING = 0;
    const STATUS_SENT = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mail_queue';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['target_email', 'from_email', 'subject', 'body', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['target_email', 'from_email', 'subject'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'target_email' => 'Target Email',
            'from_email' => 'From Email',
            'subject' => 'Subject',
            'body' => 'Body',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
