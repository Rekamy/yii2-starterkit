<?php

namespace frontend\modules\poc\controllers;

use Yii;
use common\models\JtSubcategory;
use common\models\search\JtSubcategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Exception;
use yii\helpers\Url;

/**
 * JtSubcategoryController implements the CRUD actions for JtSubcategory model.
 */
class JtSubcategoryController extends Controller
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
     * Lists all JtSubcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JtSubcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JtSubcategory model.
     * @param integer $category_id
     * @param integer $subcategory_id
     * @return mixed
     */
    public function actionView($category_id, $subcategory_id)
    {
        $model = $this->findModel($category_id, $subcategory_id);
        return $this->render('view', [
            'model' => $this->findModel($category_id, $subcategory_id),
        ]);
    }

    /**
     * Creates a new JtSubcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JtSubcategory();

        if ($model->loadAll(Yii::$app->request->post())) {
            $dbtransac = Yii::$app->db->beginTransaction();
            try {
                if(!$model->saveAll()) {
                    Throw new Exception('Request Fail');
                }
                $dbtransac->commit();
                Yii::$app->notify->success();
                return $this->redirect(['view', 'category_id' => $model->category_id, 'subcategory_id' => $model->subcategory_id]);
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
     * Updates an existing JtSubcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $category_id
     * @param integer $subcategory_id
     * @return mixed
     */
    public function actionUpdate($category_id, $subcategory_id)
    {
        $model = $this->findModel($category_id, $subcategory_id);

        if ($model->loadAll(Yii::$app->request->post())) {
            $dbtransac = Yii::$app->db->beginTransaction();
            try {
                if(!$model->saveAll()) {
                    Throw new Exception('Request Fail');
                }
                $dbtransac->commit();
                Yii::$app->notify->success();
                return $this->redirect(['view', 'category_id' => $model->category_id, 'subcategory_id' => $model->subcategory_id]);
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
     * Deletes an existing JtSubcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $category_id
     * @param integer $subcategory_id
     * @return mixed
     */
    public function actionDelete($category_id, $subcategory_id)
    {
        $dbtransac = Yii::$app->db->beginTransaction();
        try {
            $this->findModel($category_id, $subcategory_id)->deleteWithRelated();
            $dbtransac->commit();
            Yii::$app->notify->success();
        } catch (Exception $e) {
            $dbtransac->rollback();
            Yii::$app->notify->fail( ($e->errorInfo[2]) ?? $e->getMessage());
        }

        return $this->redirect(['index']);
    }

    /**
     * Permanently deletes an existing JtSubcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $category_id
     * @param integer $subcategory_id
     * @return mixed
     */
    public function actionDeletePermanent($category_id, $subcategory_id)
    {
        $model = $this->findModel($category_id, $subcategory_id);
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
     * Finds the JtSubcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $category_id
     * @param integer $subcategory_id
     * @return JtSubcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($category_id, $subcategory_id)
    {
        if (($model = JtSubcategory::findOne(['category_id' => $category_id, 'subcategory_id' => $subcategory_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
