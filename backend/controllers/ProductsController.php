<?php

namespace backend\controllers;

use common\models\Applications;
use common\models\Languages;
use Yii;
use common\models\Products;
use common\models\ProductsSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products;
        $langs = Languages::find()->all();
        $appls = Applications::find()->all();

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'img');
            $ext = end((explode(".", $image->name)));
            $avatar = Yii::$app->security->generateRandomString().".{$ext}";
            $path = Yii::getAlias('@frontend') . '/web/img/uploads/' . $avatar;

            $a_ids = Yii::$app->request->post('Products')['application_id'];

            $model->img = $avatar;
            $model->application_id = implode(',', $a_ids);

            if($model->save()){
                $image->saveAs($path);
                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                VarDumper::dump($image,10,1);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'languages' => $langs,
                'applications' => $appls,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $langs = Languages::find()->all();
        $appls = Applications::find()->all();

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'img');
            $ext = end((explode(".", $image->name)));
            $avatar = Yii::$app->security->generateRandomString().".{$ext}";
            $path = Yii::getAlias('@frontend') . '/web/img/uploads/' . $avatar;

            $a_ids = Yii::$app->request->post('Products')['application_id'];

            $model->img = $avatar;
            $model->application_id = implode(',', $a_ids);
//            VarDumper::dump($image,10,1);
            if($model->save()){
                $image->saveAs($path);
                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                VarDumper::dump($image,10,1);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'languages' => $langs,
                'applications' => $appls,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
