<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inorder".
 *
 * @property integer $id
 * @property integer $orderID
 * @property integer $cardID
 * @property integer $cost
 * @property integer $fio
 */
class Inorder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderID', 'cardID', 'cost', 'fio'], 'required'],
            [['orderID', 'cardID', 'cost'], 'integer'],
            [['fio'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderID' => 'Order ID',
            'cardID' => 'Card ID',
            'cost' => 'Cost',
            'fio' => 'Fio',
        ];
    }
}
