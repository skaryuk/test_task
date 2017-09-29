<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Taskusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taskuser-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'family_name',
            'first_name',
            'burthday',
            'sex',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
