<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\helpers\Html;
use common\models\Good;
use common\models\Cart;

class ShoppingCart extends Component
{
    private $products = [];

    public function init()
    {
        if(!Yii::$app->user->isGuest)
        {
            //get products from db
        }
        parent::init();
    }

    public function put(Good $good)
    {
        if(!in_array($good, $this->products))
        {
            $this->products[] = $good;

            if(!Yii::$app->user->isGuest)
            {
                $cart = new Cart();
                $cart->good_id = $good->id;
                $cart->user_id = Yii::$app->user->id;
                $cart->qty = $good->getQuantity();
                $cart->type = Cart::$types[Yii::$app->params['appId']];
                $cart->time_to_send_letter = strtotime('+2 weeks');
                $cart->save();
            }
        }
    }

    public function remove(Good $good)
    {
        $this->products = array_udiff($this->products, array($good), function($a, $b) { return $a === $b ? 0 : 1; });

        if(!Yii::$app->user->isGuest)
        {
            $cartItem = Cart::find()->where(['user_id' => Yii::$app->user->id, 'good_id' => $good->id, 'size' => $good->size])->one();
            $cartItem->delete();
        }
    }

    public function getItemsCount()
    {
        $items = 0;

        foreach($this->products as $product)
            $items += $product->getQuantity();

        return $items;
    }

    public function getTotalPrice()
    {
        $price = 0;

        foreach($this->products as $product)
            $price += $product->price;

        return $price;
    }

}