<?php
namespace common\helpers;

use Yii;

class Common
{
    /**
     * @return bool
     */
    public static function isDevelopmentServer()
    {
        return (bool) preg_match('@\.(dev|stage|local)\.@', $_SERVER['SERVER_NAME']);
    }
}