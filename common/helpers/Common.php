<?php
namespace common\helpers;

use Yii;
use yii\helpers\Url;

class Common
{
    /**
     * @return bool
     */
    public static function isDevelopmentServer()
    {
        return (bool) preg_match('@\.(dev|stage|local)\.@', $_SERVER['SERVER_NAME']);
    }

    /**
     * @return string
     */
    public static function createSession()
    {
        if(Yii::$app->session->has('logout'))
        {
            Yii::$app->session->remove('logout');
            $imgs = '';
            foreach(Yii::$app->params['urlsWithSingleSession'] as $url)
            {
                $imgs.='<img width="0" height="0" style="display: none;" src="'.$url.'/site/logout?sess=true" />';
            }
            return $imgs;
        }

        if(!Yii::$app->session->has('sessionId') || Yii::$app->session->get('sessionId') != session_id())
        {
            Yii::$app->session->set('sessionId', session_id());
            $imgs = '';
            foreach(Yii::$app->params['urlsWithSingleSession'] as $url)
            {
                $imgs.='<img width="0" height="0" style="display: none;" src="'.$url.'/site/create-session?sessionId='.session_id().'" />';
            }
            return $imgs;

        }
    }

    /**
     * @param $file
     * @param $params
     * @return mixed
     */
    public static function renderMailView($file, $params)
    {
        $path = __DIR__ . '/../../common/mail/'.$file.'.php';

        if(file_exists($path))
        {
            ob_start();
            ob_implicit_flush(false);
            extract($params, EXTR_OVERWRITE);
            require($path);

            return ob_get_clean();
        }
    }
}