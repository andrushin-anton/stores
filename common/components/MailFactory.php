<?php

namespace common\components;

use common\models\MailQueue;
use yii\base\Component;
use yii\web\HttpException;
use common\helpers\Common as BaseHelper;

class MailFactory extends Component
{
    const SEND_EMAIL_AFTER_REGISTER = 1;

    public function __construct()
    {
        parent::init();
    }

    public function send($rule, $obj)
    {
        if(empty($rule))
            throw new HttpException(500, 'You must specify mail rule');

        switch($rule)
        {
            case self::SEND_EMAIL_AFTER_REGISTER:
                $queue = new MailQueue();
                $queue->target_email = $obj->email;
                $queue->from_email = \Yii::$app->params['currentEmail'];
                $queue->status = MailQueue::STATUS_WAITING;
                $queue->subject = 'Регистрация на '.\Yii::$app->params['currentTitle'];
                $queue->body = BaseHelper::renderMailView('beforeRegister', ['user' => $obj]);
                $queue->created_at = time();
                $queue->updated_at = time();
                $queue->save();

        }
    }
} 