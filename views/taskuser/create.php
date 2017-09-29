<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Taskuser */

$this->title = 'Create Taskuser';
$this->params['breadcrumbs'][] = ['label' => 'Taskusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taskuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
