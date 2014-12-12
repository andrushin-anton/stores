<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\helpers\Html;

class ShoppingCart extends Component
{
    public function init()
    {
        parent::init();
    }

    public function add()
    {
        echo Html::encode('heyyy');
    }
}