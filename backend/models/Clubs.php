<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "clubs".
 *
 * @property integer $id
 * @property string $name
 * @property string $cityID
 * @property string $addres
 * @property string $description
 */
class Clubs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clubs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cityID', 'addres', 'description'], 'required'],
            [['name'], 'string', 'max' => 32],
            [['cityID'], 'integer'],
            [['addres'], 'string', 'max' => 256],
            [['description'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название клуба',
            'cityID' => 'Город',
            'addres' => 'Адрес клуба',
            'description' => 'Описание',
        ];
    }

    public function getClubsVariants()
    {
        return $this->hasMany(Clubs::className(), ['clubID' => 'id']); //xz
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityID']);
    }

    public function getCityName()
    {
        $parent = $this->city;

        return $parent ? $parent->name : '';
    }

    public static function getCityList()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = City::find()
            ->select(['id', 'name'])
            //->join('JOIN', 'options_variant option', 'options_variant.optionID = option.id')
            //->distinct(true)
            ->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }
}
