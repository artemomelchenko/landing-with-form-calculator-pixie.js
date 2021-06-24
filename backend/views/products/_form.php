<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Products $model
 * @var common\models\Languages $languages
 * @var common\models\Applications $applications
 * @var yii\widgets\ActiveForm $form
 */

$items = [];
$items2 = [];

foreach ($applications as $application){
    $items2[$application->id] = Html::img('/img/applications/'.$application->img, ['width' => '24']). " " . $application->name;
}

foreach ($languages as $language){
    $items[$language->id] = $language->name;
}

?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Введите название...', 'maxlength' => 255]],

            'application_id' => ['type' => Form::INPUT_MULTISELECT, 'items' => $items2, 'options' => ['placeholder' => 'Выберите назначения...']],

            'lang_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items' => $items, 'options' => ['placeholder' => 'Выберите язык...', ]],

            'text' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Введите описание...','rows' => 6]],

            'model' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Введите модель...', 'maxlength' => 255]],

            'weight' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Введите вес...', 'maxlength' => 255]],

            'price' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Введите цену...', 'maxlength' => 255]],

            'img' => ['type' => Form::INPUT_FILE, 'options' => ['placeholder' => 'Изображение...', 'maxlength' => 255]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Обновить'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
