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
 * CountryDataController implements the CRUD actions for CountryData model.
 */
class CountryDataController extends Controller
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
     * Lists all CountryData models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Country::find()->all();

        $file = Yii::$app->basePath.'/data/BP-各国能源具体数据-20151206.xlsx';
        $PHPExcel  = \PHPExcel_IOFactory::load($file);

        $sheet = $PHPExcel->getSheet(5); // 读取第一個工作表(编号从 0 开始)  
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数
         
        // $years = 2014-1965+1;
        // for($row = 4; $row <= $highestRow; $row++){
        //   $org = array();
        //   $country = null;
        //   $data_key = null;
        //   $data_value = null;
        //   $flag = true;
        // // $row = 5;
        //   for ($column = 0; $column <= $years; $column++) {
        //     $column_name = \PHPExcel_Cell::stringFromColumnIndex($column);
        //     $val = (string)$sheet->getCell($column_name.$row)->getValue();
              
        //     if($column == 0){
        //       if($val == "US"){
        //         $val = "United States";
        //       }
        //       if($val == "Trinidad & Tobago"){
        //         $val = "Trinidad and Tobago";
        //       }

        //       $country_model = Country::find()->where([
        //           'name_english' => $val,
        //       ])->one();

        //       if(!isset($country_model->id)){
        //         $country = null;
        //         continue;
        //       }else{
        //         $country = $country_model->id;
        //       }
        //     }
        //     if($column >=1 && trim($val)!="" && $country){
        //       $model = new CountryData();
        //       $model->country_id = $country;
        //       $model->data_key = "oil_consumption_barrels";
        //       $model->data_value = $val;
        //       $y = 1965 + $column - 1;
        //       $model->data_version = (string)$y; 
        //       $model->save();
        //     }
        //   }

        // }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single CountryData model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id,$type)
    {
      $model = CountryData::find()->where(['country_id'=>$id,'data_key'=>$type])->orderBy('data_version DESC')->all();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new CountryData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CountryData();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CountryData model.
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
     * Deletes an existing CountryData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBackup($id)
    {
        // $this->findModel($id)->delete();

        $arr = array(
          'WB-各国电力普及率-20151206.xls',
          'WB-各国能源进口比例-20151206.xls',
          'WB-各国清洁能源消费比例-20151206.xls',
          'WB-各国人均能源使用量-20151206.xls',
          'WB-各国人均碳排放量-20151206.xls',
          'WB-各国人口总量-20151206.xls',
          'WB-各国碳排放总量-20151206.xls',
          'WB-各国GDP-20151206.xls',
        );

        $key_arr = array(
          'indicator_code',
          'indicator_name',
          'source_note',
          'source_organization',
        );

        $file = Yii::$app->basePath.'/data/'.$file_path;
        $PHPExcel  = \PHPExcel_IOFactory::load($file);

        $sheet = $PHPExcel->getSheet(3); // 读取第一個工作表(编号从 0 开始)  
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数
         
        $years = 2014-1965+1;
        for($row = 5; $row <= $highestRow; $row++){
          $org = array();
          $country = null;
          $data_key = null;
          $data_value = null;
          $flag = true;
        // $row = 5;
          for ($column = 0; $column <= 3; $column++) {
            $column_name = \PHPExcel_Cell::stringFromColumnIndex($column);
            $val = (string)$sheet->getCell($column_name.$row)->getValue();
              
            $key = $key_arr[$column]?$key_arr[$column]:null;

            if($column == 1){
              if($val == "US"){
                $val == "United States";
              }
              if($val == "Trinidad & Tobago"){
                $val == "Trinidad and Tobago";
              }

              $country_model = Country::findOne([
                  'name_english' => $val,
              ]);
              if(!isset($country_model->id)){
                $country = null;
                continue;
              }else{
                $country = $country_model->id;
              }
            }
            if($column >=4 && trim($val)!="" && $country){
              $model = new CountryData();
              $model->country_id = $country;
              $model->data_key = "oil_production";
              $model->data_value = $val;
              $y = 1965 + $column - 4;
              $model->data_version = (string)$y; 
              var_dump($model->attributes);
              // $model->save();
            }
          }

        }

        

        return $this->redirect(['index']);
    }

    /**
     * Finds the CountryData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CountryData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CountryData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
