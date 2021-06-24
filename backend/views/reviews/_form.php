<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Reviews $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Name...', 'maxlength' => 255]],

            'text' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Enter Text...','rows' => 6]],

            'date' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'lang_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Lang ID...']],

            'accepted' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Accepted...']],

            'img' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Img...', 'maxlength' => 255]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
