<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Reviews $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Reviews',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
