<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order".
 *
 * @property integer $clubID
 * @property integer $managerID
 * @property string $payTime
 * @property string $deliveryTime
 * @property string $createTime
 * @property string $session
 * @property string $fullCost
 * @property integer $sms
 * @property string $fio
 * @property integer $senderPhone
 * @property integer $geterPhone
 * @property string $description
 * @property integer $special
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payTime', 'deliveryTime', 'createTime'], 'safe'],
            [['fio', 'senderPhone', 'geterPhone'], 'required'],
            [['fullCost'], 'number'],
            [['sms', 'managerID', 'clubID'], 'integer'],
            [['session'], 'integer'],
            [['fio'], 'string', 'max' => 256],
            [['senderPhone', 'geterPhone'], 'integer'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clubID' => 'Клуб',
            'managerID' => 'Менеджер',
            'payTime' => 'Оплачено',
            'deliveryTime' => 'Вручено',
            'createTime' => 'Дата создания',
            'session' => 'Session',
            'fullCost' => 'Сумма',
            'sms' => 'Sms',
            'fio' => 'ФИО',
            'senderPhone' => 'Телефон отправителя',
            'geterPhone' => 'Телефон получателя',
            'description' => 'Описание',
            'special' => 'Спецпредложение'
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

    public function getManagers()
    {
        return $this->hasOne(Managers::className(), ['id' => 'managerID']);
    }

    public function getManagersName()
    {
        $parent = $this->managers;

        return $parent ? $parent->username : '';
    }

    public static function getManagersList()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Managers::find()
            ->select(['id', 'username'])
            //->join('JOIN', 'options_variant option', 'options_variant.optionID = option.id')
            //->distinct(true)
            ->all();

        return ArrayHelper::map($parents, 'id', 'username');
    }
}
