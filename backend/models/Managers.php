<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "managers".
 *
 * @property integer $id
 * @property string $username
 * @property integer $date
 * @property integer $clubID
 * @property string $fullName
 * @property string $password_hash
 * @property string $auth_key
 */
class Managers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'clubID', 'fullName', 'phone', 'password_hash'], 'required'],
            [['date', 'clubID'], 'integer'],
            [['phone'], 'string', 'max' => 20, 'min' => 10],
            [['username'], 'string', 'max' => 32, 'min' => 4],
            [['fullName'], 'string', 'max' => 128, 'min' => 10],
            [['password_hash'], 'string', 'max' => 255, 'min' => 6],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'date' => 'Дата регистрации',
            'clubID' => 'Клуб',
            'fullName' => 'ФИО',
            'password_hash' => 'Пароль',
            'auth_key' => 'Auth Key',
            'email' => 'E-Mail',
            'phone' => 'Телефон',
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
}
