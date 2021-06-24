<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Applications $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Applications',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Applications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
