<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "options_variant".
 *
 * @property integer $id
 * @property string $name
 * @property integer $optionID
 * @property string $cost
 *
 * @property Options $option
 */
class Variants extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options_variant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'optionID', 'cost'], 'required'],
            [['optionID'], 'integer'],
            [['cost'], 'number'],
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
            'optionID' => 'Опция',
            'cost' => 'Цена',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(Options::className(), ['id' => 'optionID']);
    }

    public function getOptions()
    {
        return $this->hasOne(Options::className(), ['id' => 'optionID']);
    }

    public function getOptionsName()
    {
        $parent = $this->option;

        return $parent ? $parent->name : '';
    }

    public static function getOptionsList()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $parents = Options::find()
            ->select(['id', 'name'])
            //->join('JOIN', 'options_variant option', 'options_variant.optionID = option.id')
            //->distinct(true)
            ->all();

        return ArrayHelper::map($parents, 'id', 'name');
    }
}
