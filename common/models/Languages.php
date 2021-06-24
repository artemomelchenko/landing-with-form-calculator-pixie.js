<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%languages}}".
 *
 * @property int $id
 * @property string $lang
 * @property string $name
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%languages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return $a = [
            [['lang', 'name'], 'required'],
            [['lang', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lang' => Yii::t('app', 'Lang'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['lang_id' => 'id']);
    }

    public function getSettings()
    {
        return $this->hasMany(Settings::className(), ['lang_id' => 'id']);
    }

    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['lang_id' => 'id']);
    }
}
