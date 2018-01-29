<?php

namespace app\controllers;

use Yii;
use app\models\Hairdressers;
use app\models\HairdressersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Hairdressers2Controller implements the CRUD actions for Hairdressers model.
 */
class Hairdressers2Controller extends Controller
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
     * Lists all Hairdressers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HairdressersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hairdressers model.
     * @param string $id
     * @param integer $usersId
     * @return mixed
     */
    public function actionView($id, $usersId)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $usersId),
        ]);
    }

    /**
     * Creates a new Hairdressers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hairdressers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'usersId' => $model->usersId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Hairdressers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param integer $usersId
     * @return mixed
     */
    public function actionUpdate($id, $usersId)
    {
        $model = $this->findModel($id, $usersId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'usersId' => $model->usersId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hairdressers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param integer $usersId
     * @return mixed
     */
    public function actionDelete($id, $usersId)
    {
        $this->findModel($id, $usersId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hairdressers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param integer $usersId
     * @return Hairdressers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $usersId)
    {
        if (($model = Hairdressers::findOne(['id' => $id, 'usersId' => $usersId])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
