<?php

namespace app\controllers;

use Yii;
use app\models\Country;
use app\models\CountryData;
use app\models\CountryDataMeta;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends Controller
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
     * Lists all Country models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Country::find()->all();
        $keys = CountryDataMeta::find()->all();
        return $this->render('index', [
            'model' => $model,
            'keys' => $keys,
        ]);
    }

    /**
     * Displays a single Country model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewdata($id,$type)
    {
        $model = $this->findModel($id);
        $name = CountryDataMeta::find()->where(['indicator_code'=>$type])->one();
        $name_cn = $name->indicator_name_cn; 
        $data = CountryData::find()->where(['country_id'=>$id,'data_key'=>$type])->orderBy('data_version ASC')->all();

        $dataArr = array();
        $categories = array();

        $dataArr['name'] = $model->name;

        for($i = 0; $i < count($data); $i++) {
            $categories[] = $data[$i]['data_version'];
            $dataArr['data'][$i] = (float)$data[$i]['data_value'];
        }

        return $this->render('viewdata', [
            'model' => $model,
            'data' => json_encode($dataArr),
            'categories' => json_encode($categories),
            'name_cn'=>$name_cn,
            'fulldata'=>$data
        ]);
    }
    /**
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $countrymodel = $this->findModel($id);
        $model = new CountryData();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'id' => $countrymodel->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'countrymodel'=>$countrymodel
            ]);
        }
    }

    /**
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Deletes an existing Country model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
