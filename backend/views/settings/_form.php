<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Settings $model
 * @var yii\widgets\ActiveForm $form
 * @var common\models\Languages $languages
 */

$items2 = [];
foreach ($languages as $language){
    $items[$language->id] = $language->name;
}
?>

<div class="settings-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Name...', 'maxlength' => 255]],
            'lang_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items' => $items, 'options' => ['placeholder' => 'Enter Lang ID...', ]],
//            'title' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Title...', 'maxlength' => 255]],
//            'img' => ['type' => Form::INPUT_FILE, 'options' => ['placeholder' => 'Enter Img...', 'maxlength' => 255]],
            'text' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Enter Text...','rows' => 6]],


        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
