<?php

namespace app\controllers;

use Yii;
use app\models\Taskadress;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\YiiAsset;

/**
 * TaskadressController implements the CRUD actions for Taskadress model.
 */
class TaskadressController extends Controller
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
     * Lists all Taskadress models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Taskadress::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Taskadress model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
//        echo '<pre>';
//        print_r ($this->findModel($id)->userid);
//        echo '</pre>';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Taskadress model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionMycreate($userid)
    {
        $model = new Taskadress();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['taskuser/update', 'id' => $model->userid]);
        } else {
            return $this->render('create_userid', [
                'model' => $model, 'userid' => $userid,
            ]);
        }
    }
    
    
    public function actionCreate()
    {
        $model = new Taskadress();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['taskadress', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Taskadress model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['taskuser/update', 'id' => $model->userid]);
//            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Taskadress model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $userid=$this->findModel($id)->userid;
        $this->findModel($id)->delete();

        return $this->redirect(['taskuser/update', 'id' => $userid]);
//        return $this->redirect(['index']);
    }

    /**
     * Finds the Taskadress model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Taskadress the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Taskadress::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
