<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clubs".
 *
 * @property integer $id
 * @property string $name
 * @property integer $cityID
 * @property string $addres
 * @property string $description
 *
 * @property Cards[] $cards
 * @property City $city
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
            [['cityID'], 'integer'],
            [['name'], 'string', 'max' => 32],
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
            'name' => 'Name',
            'cityID' => 'City ID',
            'addres' => 'Addres',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Cards::className(), ['clubID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityID']);
    }
}
