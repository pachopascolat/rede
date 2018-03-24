<?php

namespace app\controllers;

use Yii;
use app\models\Lance;
use app\models\LanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LanceController implements the CRUD actions for Lance model.
 */
class LanceController extends Controller
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'add-cajones', 'add-captura', 'add-info-diversidad', 'add-submuestra', 'add-talla-sexo-plantilla'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Lance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lance model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerCajones = new \yii\data\ArrayDataProvider([
            'allModels' => $model->cajones,
        ]);
        $providerCaptura = new \yii\data\ArrayDataProvider([
            'allModels' => $model->capturas,
        ]);
        $providerInfoDiversidad = new \yii\data\ArrayDataProvider([
            'allModels' => $model->infoDiversidads,
        ]);
        $providerSubmuestra = new \yii\data\ArrayDataProvider([
            'allModels' => $model->submuestras,
        ]);
        $providerTallaSexoPlantilla = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tallaSexoPlantillas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerCajones' => $providerCajones,
            'providerCaptura' => $providerCaptura,
            'providerInfoDiversidad' => $providerInfoDiversidad,
            'providerSubmuestra' => $providerSubmuestra,
            'providerTallaSexoPlantilla' => $providerTallaSexoPlantilla,
        ]);
    }

    /**
     * Creates a new Lance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lance();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id_lance]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Lance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id_lance]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Lance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export Lance information into PDF format.
     * @param string $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerCajones = new \yii\data\ArrayDataProvider([
            'allModels' => $model->cajones,
        ]);
        $providerCaptura = new \yii\data\ArrayDataProvider([
            'allModels' => $model->capturas,
        ]);
        $providerInfoDiversidad = new \yii\data\ArrayDataProvider([
            'allModels' => $model->infoDiversidads,
        ]);
        $providerSubmuestra = new \yii\data\ArrayDataProvider([
            'allModels' => $model->submuestras,
        ]);
        $providerTallaSexoPlantilla = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tallaSexoPlantillas,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerCajones' => $providerCajones,
            'providerCaptura' => $providerCaptura,
            'providerInfoDiversidad' => $providerInfoDiversidad,
            'providerSubmuestra' => $providerSubmuestra,
            'providerTallaSexoPlantilla' => $providerTallaSexoPlantilla,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    
    /**
     * Finds the Lance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Lance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Cajones
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddCajones()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Cajones');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formCajones', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Captura
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddCaptura()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Captura');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formCaptura', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for InfoDiversidad
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddInfoDiversidad()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('InfoDiversidad');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formInfoDiversidad', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Submuestra
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddSubmuestra()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Submuestra');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSubmuestra', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for TallaSexoPlantilla
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddTallaSexoPlantilla()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('TallaSexoPlantilla');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formTallaSexoPlantilla', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
