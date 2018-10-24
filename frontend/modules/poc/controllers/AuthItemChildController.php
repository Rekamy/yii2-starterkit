<?php

namespace frontend\modules\poc\controllers;

use Yii;
use common\models\AuthItemChild;
use common\models\search\AuthItemChildSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Exception;
use yii\helpers\Url;

/**
 * AuthItemChildController implements the CRUD actions for AuthItemChild model.
 */
class AuthItemChildController extends Controller
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
     * Lists all AuthItemChild models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemChildSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItemChild model.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionView($parent, $child)
    {
        $model = $this->findModel($parent, $child);
        return $this->render('view', [
            'model' => $this->findModel($parent, $child),
        ]);
    }

    /**
     * Creates a new AuthItemChild model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItemChild();

        if ($model->loadAll(Yii::$app->request->post())) {
            $dbtransac = Yii::$app->db->beginTransaction();
            try {
                if(!$model->saveAll()) {
                    Throw new Exception('Request Fail');
                }
                $dbtransac->commit();
                Yii::$app->notify->success();
                return $this->redirect(['view', 'parent' => $model->parent, 'child' => $model->child]);
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
     * Updates an existing AuthItemChild model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionUpdate($parent, $child)
    {
        $model = $this->findModel($parent, $child);

        if ($model->loadAll(Yii::$app->request->post())) {
            $dbtransac = Yii::$app->db->beginTransaction();
            try {
                if(!$model->saveAll()) {
                    Throw new Exception('Request Fail');
                }
                $dbtransac->commit();
                Yii::$app->notify->success();
                return $this->redirect(['view', 'parent' => $model->parent, 'child' => $model->child]);
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
     * Deletes an existing AuthItemChild model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionDelete($parent, $child)
    {
        $dbtransac = Yii::$app->db->beginTransaction();
        try {
            $this->findModel($parent, $child)->deleteWithRelated();
            $dbtransac->commit();
            Yii::$app->notify->success();
        } catch (Exception $e) {
            $dbtransac->rollback();
            Yii::$app->notify->fail( ($e->errorInfo[2]) ?? $e->getMessage());
        }

        return $this->redirect(['index']);
    }

    /**
     * Permanently deletes an existing AuthItemChild model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionDeletePermanent($parent, $child)
    {
        $model = $this->findModel($parent, $child);
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
     * Finds the AuthItemChild model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $parent
     * @param string $child
     * @return AuthItemChild the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($parent, $child)
    {
        if (($model = AuthItemChild::findOne(['parent' => $parent, 'child' => $child])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
