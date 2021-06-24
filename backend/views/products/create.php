<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Products $model
 * @var common\models\Languages $languages
 * @var common\models\Applications $applications
 */

$this->title = Yii::t('app', 'Добавить товар', [
    'modelClass' => 'Products',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'applications' => $applications,
    ]) ?>

</div>
