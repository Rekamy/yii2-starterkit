<?php

namespace frontend\modules\poc\controllers;

use Yii;
use common\models\Inventory;
use common\models\search\InventorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Exception;
use yii\helpers\Url;

/**
 * InventoryController implements the CRUD actions for Inventory model.
 */
class InventoryController extends Controller
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
    /*
    public function beforeAction($action)
    {
        $toRedir = [
            'update' => 'view',
            'create' => 'view',
            'delete' => 'index',
        ];

        if (isset($toRedir[$action->id])) {
            Yii::$app->response->redirect(Url::to([$toRedir[$action->id]]), 301);
            Yii::$app->end();
        }
        return parent::beforeAction($action);
    }
    */

    /**
     * Lists all Inventory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InventorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inventory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Inventory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inventory();

        if ($model->loadAll(Yii::$app->request->post())) {
            $dbtransac = Yii::$app->db->beginTransaction();
            try {
                if(!$model->saveAll()) {
                    Throw new Exception('Request Fail');
                }
                $dbtransac->commit();
                Yii::$app->notify->success();
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (Exception $e) {
                $dbtransac->rollback();
                Yii::$app->notify->fail( ($e->errorInfo[2]) ?? $e->getMessage());
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Inventory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
            $dbtransac = Yii::$app->db->beginTransaction();
            try {
                if(!$model->saveAll()) {
                    Throw new Exception('Request Fail');
                }
                $dbtransac->commit();
                Yii::$app->notify->success();
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (Exception $e) {
                $dbtransac->rollback();
                Yii::$app->notify->fail( ($e->errorInfo[2]) ?? $e->getMessage());
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Inventory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $dbtransac = Yii::$app->db->beginTransaction();
        try {
            $this->findModel($id)->deleteWithRelated();
            $dbtransac->commit();
            Yii::$app->notify->success();
        } catch (Exception $e) {
            $dbtransac->rollback();
            Yii::$app->notify->fail( ($e->errorInfo[2]) ?? $e->getMessage());
        }

        return $this->redirect(['index']);
    }

    /**
     * Permanently deletes an existing Inventory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletePermanent($id)
    {
        $model = $this->findModel($id);
        $dbtransac = Yii::$app->db->beginTransaction();
        try {
            if($model->deleted_by != 0) {
                if(!$model->delete()) {
                    Throw new Exception('Fail');
                }
            }

            $dbtransac->commit();
            Yii::$app->notify->success();
        } catch (Exception $e) {
            $dbtransac->rollback();
            Yii::$app->notify->fail( ($e->errorInfo[2]) ?? $e->getMessage());
        }

        return $this->redirect(['index']);
    }


    /**
     * Finds the Inventory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inventory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inventory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
