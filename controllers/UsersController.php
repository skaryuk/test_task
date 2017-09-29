<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\Addresses;
use app\models\UserAddress;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find(),
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //правка sk_admin@list.ru 28.09.17 23:07
        $totalCount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM user_address LEFT JOIN addresses ON user_address.id = addresses.id where user_address.user_id="3"')->queryScalar();
        $myquery='SELECT * FROM user_address LEFT JOIN addresses ON user_address.id = addresses.id where user_address.user_id="3"';
        $dataProvider = new SqlDataProvider([
           'sql' => $myquery,
           'totalCount' => $totalCount
        ]);
        $dataProvider->pagination = false;
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'temp' => $id,
            'dataProvider' => $dataProvider,
        ]);
        
        
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
//        $modelAddresses = new Addresses();
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

// $totalCount = Yii::$app->db->createCommand('SELECT COUNT(*) FROM user_address LEFT JOIN addresses ON user_address.id = addresses.id where user_address.user_id="3"')->queryScalar();
//        $myquery='SELECT * FROM user_address LEFT JOIN addresses ON user_address.id = addresses.id where user_address.user_id="3"';
//        $dataProvider = new SqlDataProvider([
//           'sql' => $myquery,
//           'totalCount' => $totalCount
//        ]);
//        $dataProvider->pagination = false;
        
        //!!!!!!!!!!
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'temp' => 'test']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
