<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%reviews}}".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $img
 * @property string $date
 * @property int $lang_id
 * @property int $accepted
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%reviews}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'date', 'lang_id'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['lang_id', 'accepted'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', 'Имя'),
            'text' => Yii::t('app', 'Сообщение'),
            'img' => Yii::t('app', 'Аватарка'),
            'date' => Yii::t('app', 'Дата'),
            'lang_id' => Yii::t('app', 'Язык'),
            'accepted' => Yii::t('app', 'Принято'),
        ];
    }
}
