<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Products $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= Html::a('<i class="glyphicon glyphicon-repeat"></i> Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>

    <?= DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
//        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
//        'panel' => [
//            'heading' => $this->title,
//            'type' => DetailView::TYPE_INFO,
//        ],
        'attributes' => [
//            'id',
            'name',
            'model',
            'weight',
            'price',
            'text:ntext',
            [
                'attribute'=>'img',
                'format' => 'raw',
                'value' => Html::img('/img/uploads/'.$model->img,[
                        'style' => 'width:150px;'
                    ]),
//                'updateMarkup' => function($form, $widget) {
//                    $model = $widget->model;
//                    return $form->field($model, 'img')->fileInput();
//                }
            ],
            [
                'attribute'=>'application_id',
                'format' => 'raw',
                'value' => \yii\helpers\ArrayHelper::getValue(\common\models\Applications::findAll(['id' => explode(',', $model->application_id)]), function ($item){
                    $arr = [];
                    foreach ($item as $i){
                        $arr[] = Html::img('/img/applications/'.$i->img,[
                            'style' => 'width:50px;', 'title' => $i->name
                        ]);
                    }

                    return implode(' ', $arr);
                }),
//                'updateMarkup' => function($form, $widget) {
//                    $model = $widget->model;
//                    return $form->field($model, 'img')->CheckboxList(
//                        \common\models\Applications::find()->select(['name', 'id'])->indexBy('id')->column()
//                    );
//                }
            ],
            [
                'attribute'=>'lang_id',
                'format' => 'raw',
                'value' => \common\models\Languages::findOne($model->lang_id)->name,
//                'updateMarkup' => function($form, $widget) {
//                    $model = $widget->model;
//                    return $form->field($model, 'img')->dropdownList(
//                        \common\models\Languages::find()->select(['name', 'id'])->indexBy('id')->column()
//                    );
//                }
            ],
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->id],
        ],
//        'enableEditMode' => true,
    ]) ?>

</div>
