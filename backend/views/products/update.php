<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Products $model
 * @var common\models\Languages $languages
 * @var common\models\Applications $applications
 */

$this->title = Yii::t('app', 'Редактировать {modelClass}: ', [
    'modelClass' => 'Товар',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'applications' => $applications,
    ]) ?>

</div>
