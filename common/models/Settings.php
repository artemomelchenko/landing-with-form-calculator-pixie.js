<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%settings}}".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $img
 * @property string $title
 * @property int $lang_id
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%settings}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'lang_id'], 'required'],
            [['text'], 'string'],
            [['lang_id'], 'integer'],
            [['name', 'img', 'title'], 'string', 'max' => 255],
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
            'text' => Yii::t('app', 'Текст'),
            'img' => Yii::t('app', 'Img'),
            'title' => Yii::t('app', 'Title'),
            'lang_id' => Yii::t('app', 'Язык'),
        ];
    }
}
