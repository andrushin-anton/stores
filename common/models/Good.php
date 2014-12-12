<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $name
 * @property string $en_name
 * @property string $uniqueid
 * @property string $article
 * @property integer $price
 * @property integer $old_price
 * @property string $short_description
 * @property string $en_short_description
 * @property string $long_description
 * @property string $en_long_description
 * @property integer $infinity
 * @property integer $remove_from_novelty
 * @property string $weight
 * @property string $volume
 * @property integer $property
 * @property string $color
 * @property string $en_color
 * @property integer $visible
 * @property integer $internet
 * @property integer $accessory
 * @property integer $bestia
 * @property string $insulation
 * @property string $theme
 * @property string $year
 * @property string $season
 * @property string $en_season
 * @property string $category
 * @property string $en_category
 * @property string $novelty
 * @property string $style
 * @property string $translit_color
 * @property string $color_sclonenie
 * @property string $photo1
 * @property string $photo2
 * @property string $photo3
 * @property string $photo4
 */
class Good extends \yii\db\ActiveRecord
{
    private $quantity = 1;
    private $size = 'One';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'en_name', 'uniqueid', 'article', 'price', 'old_price', 'short_description', 'en_short_description', 'long_description', 'en_long_description', 'volume', 'color', 'en_color', 'internet', 'insulation', 'theme', 'year', 'season', 'en_season', 'category', 'en_category', 'novelty', 'style', 'translit_color', 'color_sclonenie', 'photo1', 'photo2', 'photo3', 'photo4'], 'required'],
            [['price', 'old_price', 'infinity', 'remove_from_novelty', 'property', 'visible', 'internet', 'accessory', 'bestia'], 'integer'],
            [['name'], 'string', 'max' => 400],
            [['en_name', 'insulation'], 'string', 'max' => 200],
            [['uniqueid'], 'string', 'max' => 1000],
            [['article', 'weight', 'color', 'theme', 'category', 'en_category', 'translit_color', 'color_sclonenie'], 'string', 'max' => 100],
            [['short_description', 'en_short_description', 'long_description', 'en_long_description'], 'string', 'max' => 500],
            [['volume', 'season', 'en_season', 'style', 'photo1', 'photo2', 'photo3', 'photo4'], 'string', 'max' => 50],
            [['en_color'], 'string', 'max' => 70],
            [['year'], 'string', 'max' => 10],
            [['novelty'], 'string', 'max' => 1],
            [['uniqueid'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'en_name' => 'En Name',
            'uniqueid' => 'Uniqueid',
            'article' => 'Article',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'short_description' => 'Short Description',
            'en_short_description' => 'En Short Description',
            'long_description' => 'Long Description',
            'en_long_description' => 'En Long Description',
            'infinity' => 'Infinity',
            'remove_from_novelty' => 'Remove From Novelty',
            'weight' => 'Weight',
            'volume' => 'Volume',
            'property' => 'Property',
            'color' => 'Color',
            'en_color' => 'En Color',
            'visible' => 'Visible',
            'internet' => 'Internet',
            'accessory' => 'Accessory',
            'bestia' => 'Bestia',
            'insulation' => 'Insulation',
            'theme' => 'Theme',
            'year' => 'Year',
            'season' => 'Season',
            'en_season' => 'En Season',
            'category' => 'Category',
            'en_category' => 'En Category',
            'novelty' => 'Novelty',
            'style' => 'Style',
            'translit_color' => 'Translit Color',
            'color_sclonenie' => 'Color Sclonenie',
            'photo1' => 'Photo1',
            'photo2' => 'Photo2',
            'photo3' => 'Photo3',
            'photo4' => 'Photo4',
        ];
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = (int)$quantity;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }
}
