<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'family_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'burthday')->textInput() ?>

    <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>
    
    <? echo '<pre>';
print_r ($temp);
echo '</pre>';?>
    
    <?  
        echo '<h3>Текущие адреса пользователя</h3>';
        
        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                'address',
                'comment',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    
   
</div>
