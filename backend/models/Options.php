<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "options".
 *
 * @property integer $id
 * @property string $name
 * @property integer $isMultySelect
 *
 * @property OptionsVariant[] $optionsVariants
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['isMultySelect'], 'integer'],
            [['name'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'isMultySelect' => 'Вид опции',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptionsVariants()
    {
        return $this->hasMany(Options::className(), ['optionID' => 'id']);
    }


}




