<?php

namespace frontend\controllers;

use Yii;
use app\models\Staff;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
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
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $staffs = Staff::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $staffs,
            'pagination' => ['pageSize' => 2],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Staff model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Staff();

        if ($model->load(Yii::$app->request->post())) {

            $fileUpload = UploadedFile::getInstance($model, 'avatar');
            if(empty($fileUpload)){
                $model->avatar = 'default.png';
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $model->avatar = UploadedFile::getInstance($model, 'avatar');

                if ($model->avatar && $model->validate()) {                
                    $model->avatar->saveAs('images/' . Yii::$app->security->generateRandomString(30) . '.' . $model->avatar->extension);
                    // $model->avatar = 'ddd';
                }   
                if ($model->validate() && $model->save()) {           
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    return $this->render('create', [
                    'model' => $model,
                ]);
                }
            }
           
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->avatar;
        if ($model->load(Yii::$app->request->post())) {          
            $fileUpload = UploadedFile::getInstance($model, 'avatar');
            if(empty($fileUpload)){
                $model->avatar = $oldImage;
            }else{
                if($oldImage != 'default.png'){
                    @unlink("images/".$oldImage);
                }              
                $model->avatar = Yii::$app->security->generateRandomString(30).'.'.$fileUpload->extension;
            }   

            if ($model->validateStaff() && $model->save()) {
                if(!empty($fileUpload)){
                    $fileUpload->saveAs('images/' . $model->avatar);
                }               
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing Staff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->avatar != 'default.png'){
            @unlink("images/".$model->avatar);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
