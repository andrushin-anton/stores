<?php
namespace console\controllers;

use common\models\MailQueue;
use Yii;
use yii\console\Controller;

/**
 * Main console controller
 */
class MainController extends Controller
{

    /**
     * Sends mail each 15 seconds
     */
    public function actionMail()
    {
        $messages = MailQueue::find()
            ->where(['status' => MailQueue::STATUS_WAITING])
            ->limit(7)
            ->all();

        foreach($messages as $message)
        {
            if(\Yii::$app->mailer->compose()
                ->setFrom([$message->from_email => $message->subject])
                ->setTo($message->target_email)
                ->setSubject($message->subject)
                ->setTextBody($message->body)
                ->send())
            {
                //$message->status = MailQueue::STATUS_SENT;
                $message->delete();
            }
            sleep(15);
        }
    }
}
