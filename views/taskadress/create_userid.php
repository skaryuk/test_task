<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Taskadress */

$this->title = 'Create Taskadress';
$this->params['breadcrumbs'][] = ['label' => 'Taskadresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taskadress-create">
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_userid', [
        'model' => $model, 'userid' => $userid,
    ]) ?>

</div>
