<?php

namespace app\controllers;

use Yii;
use app\models\Services;
use app\models\ServicesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ServiceCategories;
use \app\models\Hairdressers;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
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
     * Lists all Services models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $categories = ServiceCategories::find()->all();
        $categoryArray = [];
        foreach($categories as $category){
            $categoryArray[$category->id ] = $category->title;
        }
        
        $isHairdresser = false;
        if(!Yii::$app->user->isGuest){
            $hairdressers = Hairdressers::find()->where(['usersId' => Yii::$app->user->identity->id])->one();
            if(!empty($hairdressers)){
                $isHairdresser = true;
            }
        }
        
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categoryArray,
            'isHairdresser' => $isHairdresser
        ]);
    }

    /**
     * Displays a single Services model.
     * @param string $id
     * @param string $serviceCategoriesId
     * @param string $hairdressersId
     * @return mixed
     */
    public function actionView($id)
    {
        $categories = ServiceCategories::find()->all();
        $categoryArray = [];
        foreach($categories as $category){
            $categoryArray[$category->id ] = $category->title;
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'categories' => $categoryArray
        ]);
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Creates a new Services model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Services();
        $model2 = new \app\models\Photos();
        //$model2->setAttribute('path',$_FILES["photos"]['path']);
        
        $categories = ServiceCategories::find()->all();
        $categoryArray = [];
        foreach($categories as $category){
            $categoryArray[$category->id ] = $category->title;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'serviceCategoriesId' => $model->serviceCategoriesId, 'hairdressersId' => $model->hairdressersId]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
                'categories' => $categoryArray,
            ]);
        }
    }

    /**
     * Updates an existing Services model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param string $serviceCategoriesId
     * @param string $hairdressersId
     * @return mixed
     */
    public function actionUpdate($id, $serviceCategoriesId, $hairdressersId)
    {
        $model = $this->findModel($id, $serviceCategoriesId, $hairdressersId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'serviceCategoriesId' => $model->serviceCategoriesId, 'hairdressersId' => $model->hairdressersId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Services model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param string $serviceCategoriesId
     * @param string $hairdressersId
     * @return mixed
     */
    public function actionDelete($id, $serviceCategoriesId, $hairdressersId)
    {
        $this->findModel($id, $serviceCategoriesId, $hairdressersId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Services model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param string $serviceCategoriesId
     * @param string $hairdressersId
     * @return Services the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Services::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
