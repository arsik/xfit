<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cards".
 *
 * @property integer $id
 * @property integer $cardTypeID
 * @property integer $clubID
 * @property integer $cost
 * @property string $header
 * @property string $description
 * @property integer $vizitingID
 * @property integer $durationID
 *
 * @property Types $cardType
 * @property Clubs $club
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
            [['cardTypeID', 'clubID', 'cost', 'header', 'description', 'vizitingID', 'durationID'], 'required'],
            [['cardTypeID', 'clubID', 'cost', 'vizitingID', 'durationID'], 'integer'],
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
            'cardTypeID' => 'Card Type ID',
            'clubID' => 'Club ID',
            'cost' => 'Cost',
            'header' => 'Header',
            'description' => 'Description',
            'vizitingID' => 'Viziting ID',
            'durationID' => 'Duration ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardType()
    {
        return $this->hasOne(Types::className(), ['id' => 'cardTypeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClub()
    {
        return $this->hasOne(Clubs::className(), ['id' => 'clubID']);
    }
}
