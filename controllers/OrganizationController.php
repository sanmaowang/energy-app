<?php

namespace app\controllers;

use Yii;
use app\models\Organization;
use app\models\CountryOrgRel;
use app\models\Country;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrganizationController implements the CRUD actions for Organization model.
 */
class OrganizationController extends Controller
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
     * Lists all Organization models.
     * @return mixed
     */
    public function actionIndex()
    {
        $orgs = Organization::find()->all();

        // $file = Yii::$app->basePath."/data.xlsx";
        // $PHPExcel  = \PHPExcel_IOFactory::load($file);

        // $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表(编号从 0 开始)  
        // $highestRow = $sheet->getHighestRow(); // 取得总行数
        // $highestColumm = $sheet->getHighestColumn(); // 取得总列数
         
        // $country_arr = array();

        // $row = 8;
        // // for($row = 9;$row <= $highestRow;$row++){
        //   // $model = new CountryOrgRel();
        //   $org = array();
        //   for ($column = 9; $column <= 213; $column++) {//列数是以A列开始
        //     $column_name = \PHPExcel_Cell::stringFromColumnIndex($column);
        //     $row_country_name = 8;
        //     $val = (string)$sheet->getCell($column_name.$row_country_name)->getValue();
        //     $country_model = Country::findOne([
        //         'name_english' => $val,
        //     ]);
        //     // echo isset($country_model->name)?"":$column_name.$row.":".$val;
        //     // echo "</br>";
        //     if(isset($country_model->id)){
        //       for($row = 9; $row<=$highestRow;$row++){
        //         $val = (string)$sheet->getCell($column_name.$row)->getValue();
        //         $org_id = $row - 8 ;
                

        //         $type = null;
        //         if($val == "1"){
        //           $type = '1';
        //           // echo $country_model->name_english."___is".$row."_1<br/>";
        //         }else if(strtolower($val) == "o"){
        //           $type = "o";
        //           // echo $country_model->name_english."___o".$row."<br/>";
        //         }else if(strtolower($val) == "p"){
        //           $type = "p";
        //           // echo $country_model->name_english."___p".$row."<br/>";
        //         }else if(strtolower($val) == "m+"){
        //           $type = "m+";
        //           // echo $country_model->name_english."___m+".$row."_1<br/>";
        //         }else if(strtolower($val) == "o/m+"){
        //           $type = "o/m+";
        //           // echo $country_model->name_english."___o/m+".$row."_1<br/>";
        //         }

        //         if($type){
        //           $model = new CountryOrgRel;
        //           $model->org_id = $org_id;
        //           $model->country_id = $country_model->id;
        //           $model->type = $type;
        //           $model->save();
        //         }
        //       }
        //     }
            
        //     $country_arr[] = trim($val);
        //     // echo $column_name.$row.":".$sheet->getCell($column_name.$row)->getValue()."<br />";
        //   }
        //   // var_dump($country_arr);
        //   // $model->name = $org['name'];
        //   // $model->slug = $org['slug'];
        //   // $model->founding_year = $org['founding_year'];
        //   // $model->initiating_country = $org['initiating_country'];
        //   // $model->funding_model = $org['funding_model'];
        //   // $model->top_funding_country = $org['top_funding_country'];
        //   // $model->responsible_person = $org['responsible_person'];

        //   // $model->save();
        // // }


        return $this->render('index', [
            'orgs' => $orgs,
        ]);
    }

    /**
     * Displays a single Organization model.
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
     * Creates a new Organization model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Organization();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Organization model.
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
     * Deletes an existing Organization model.
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
     * Finds the Organization model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Organization::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
