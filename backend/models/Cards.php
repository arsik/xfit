<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cards".
 *
 * @property integer $id
 * @property integer $cardTypeID
 * @property integer $clubID
 * @property integer $cost
 * @property integer $header
 * @property string $description
 */
class Cards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cardTypeID', 'clubID', 'cost', 'header', 'description'], 'required'],
            [['cardTypeID', 'clubID', 'cost'], 'integer'],
            [['header'], 'string', 'max' => 24],
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
            'cardTypeID' => 'Тип карты',
            'clubID' => 'Клуб',
            'cost' => 'Цена',
            'header' => 'Название карты',
            'description' => 'Описание',
        ];
    }

    public function getClubs()
    {
        return $this->hasOne(Clubs::className(), ['id' => 'clubID']);
    }

    public function getClubsName()
    {
        $parent = $this->clubs;

        return $parent ? $parent->name : '';
    }

    public static function getClubsList()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Clubs::find()
            ->select(['id', 'name'])
            //->join('JOIN', 'options_variant option', 'options_variant.optionID = option.id')
            //->distinct(true)
            ->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }

    public function getTypes()
    {
        return $this->hasOne(Types::className(), ['id' => 'cardTypeID']);
    }

    public function getTypesName()
    {
        $parent = $this->types;

        return $parent ? $parent->name : '';
    }

    public static function getTypesList()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Types::find()
            ->select(['id', 'name'])
            //->join('JOIN', 'options_variant option', 'options_variant.optionID = option.id')
            //->distinct(true)
            ->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }
}
