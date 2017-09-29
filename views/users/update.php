<?php

use yii\helpers\Html;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Update Users: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-update">

    
    
    <h1><?= Html::encode($this->title) ?></h1>
<?

 $totalCount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM user_address LEFT JOIN addresses ON user_address.id = addresses.id where user_address.user_id="3"')->queryScalar();
        $myquery='SELECT * FROM user_address LEFT JOIN addresses ON user_address.id = addresses.id where user_address.user_id="3"';
        $dataProvider = new SqlDataProvider([
           'sql' => $myquery,
           'totalCount' => $totalCount
        ]);
        $dataProvider->pagination = false;?>
    
    <?= $this->render('_form', [
        'model' => $model,
        'temp' => $model->id,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
