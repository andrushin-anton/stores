<?php
namespace common\models;

use common\components\MailFactory;
use yii\base\Model;
use Yii;
use yii\debug\models\search\Mail;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $f_name;
    public $l_name;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['f_name','l_name'], 'filter', 'filter' => 'trim'],
            [['f_name','l_name'], 'required'],
            [['f_name','l_name'], 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот email уже используется.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->f_name = $this->f_name;
            $user->l_name = $this->l_name;
            $user->email = $this->email;
            $user->active = 0;
            $user->code = rand(1,100).rand(1,100).rand(1,100);
            $user->from_site = Yii::$app->params['appId'];
            $user->setPassword($this->password);
            if($user->save())
            {
                Yii::$app->mailFactory->send(MailFactory::SEND_EMAIL_AFTER_REGISTER, $user);
                return $user;
            }
        }

        return null;
    }
}
