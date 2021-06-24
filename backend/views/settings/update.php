<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Settings $model
 * @var common\models\Languages $languages
 */

$this->title = Yii::t('app', 'Редактировать {modelClass}: ', [
    'modelClass' => 'Настройки',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="settings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
    ]) ?>

</div>
