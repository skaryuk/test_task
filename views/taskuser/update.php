<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Taskuser */

$this->title = 'Update Taskuser: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Taskusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taskuser-update">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <h1>Адреса пользователя:</h1>
<?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'address',
            'comment',
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'class' => 'yii\grid\ActionColumn',
                    'update' => function ($url, $model, $key) {
                        return Html::a('', ['/taskadress/update', 'id' => $model->id],['class' => 'glyphicon glyphicon-pencil']);
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a('', ['/taskadress/view', 'id' => $model->id],['class' => 'glyphicon glyphicon-eye-open']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('', 
                                       ['/taskadress/delete', 'id' => $model->id], 
                                       ['class' => 'glyphicon glyphicon-trash',
                                        'data-method' => 'post',
                                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?')
                                       ]
                                            //'title' => Yii::t('yii', 'Delete'),
                                            
//                                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
//                                            'data-method' => 'post',
//                                            'data-pjax' => '1',
                                       
                                );
                        //return Html::a('', ['/taskadress/delete', 'id' => $model->id],['class' => 'glyphicon glyphicon-trash']);
                    },
                ],
            ],
        ],
        
    ]); ?>

    <p>
        <?//= Html::a('Create Taskadress', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(
                    'Create Taskadress',
                    ['taskadress/mycreate' , 'userid' => $userID],
                    ['class' => 'btn btn-success']
            );?>
    </p>
</div>
