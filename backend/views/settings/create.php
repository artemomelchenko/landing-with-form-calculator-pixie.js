<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Settings $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Settings',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
