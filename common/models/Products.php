<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property int $id
 * @property string $name
 * @property string $model
 * @property string $weight
 * @property string $price
 * @property string $text
 * @property string $img
 * @property string $application_id
 * @property int $lang_id
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'lang_id', 'img'], 'required'],
            [['text'], 'string'],
            [['lang_id'], 'integer'],
            [['name', 'model', 'weight', 'price', 'application_id'], 'string', 'max' => 255],
            [['img'], 'safe'],
            [['img'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название'),
            'model' => Yii::t('app', 'Модель'),
            'weight' => Yii::t('app', 'Вес'),
            'price' => Yii::t('app', 'Цена'),
            'text' => Yii::t('app', 'Текст'),
            'img' => Yii::t('app', 'Изображение'),
            'application_id' => Yii::t('app', 'Применение'),
            'lang_id' => Yii::t('app', 'Язык'),
        ];
    }



}
