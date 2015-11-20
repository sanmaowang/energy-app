<?php

namespace app\controllers;

use Yii;
use app\models\CountryOrgRel;
use app\models\Country;
use app\models\Organization;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountryorgController implements the CRUD actions for CountryOrgRel model.
 */
class CountryorgController extends Controller
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
     * Lists all CountryOrgRel models.
     * @return mixed
     */
    public function actionIndex()
    {
      return $this->redirect(['organization/index']);
        $dataProvider = new ActiveDataProvider([
            'query' => CountryOrgRel::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CountryOrgRel model.
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
     * Creates a new CountryOrgRel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($oid)
    {
      $org = Organization::findOne(['id' =>$oid]);
      $countries = Country::find()->all();
      $rels = CountryOrgRel::find()->where(['org_id'=>$oid])->all();

      $model = new CountryOrgRel();

        if (Yii::$app->request->post()) {
          $model->load(Yii::$app->request->post());
          $count = CountryOrgRel::find()->where([
            'org_id' => $model->org_id,
            'country_id' => $model->country_id
            ])->count();
          if($count == 0){
            $model->save();
          }
          return $this->redirect(['create', 'oid' => $model->org_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'org'=>$org,
                'countries'=>$countries,
                'rels'=>$rels
            ]);
        }
    }

    /**
     * Updates an existing CountryOrgRel model.
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
     * Deletes an existing CountryOrgRel model.
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
     * Finds the CountryOrgRel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CountryOrgRel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CountryOrgRel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
