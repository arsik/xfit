<?php

namespace backend\controllers;

use app\models\Cards;
use app\models\Inorder;
use Yii;
use app\models\Order;
use app\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
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
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();
        $session = Yii::$app->session;

        if ($model->load(Yii::$app->request->post())) {
            $model->setIsNewRecord(true);
            $model->createTime = date('Y-m-d H:i:s');
            $model->session = $session->get('session_order');
            $model->fullCost = $session->get('fullcost');
            $model->save();
            $fullCart = $session['cart'];
            $fioCart = $session['cart_fio'];
            if($fullCart && $fioCart) {
                for($i = 0; $i < $session->get('cards'); $i++)
                {
                    $inOrder = new Inorder();
                    $inOrder->setIsNewRecord(true);
                    $inOrder->orderID = $model->id;
                    $inOrder->cardID = $session['cart'][$i];
                    $thisCard = Cards::find()->where(['id' => $session['cart'][$i]])->one();
                    $inOrder->cost = $thisCard->cost;
                    $inOrder->fio = $session['cart_fio'][$i];
                    $inOrder->save();
                }
            }
            $session->remove('cards');
            $session->remove('session_order');
            $session->remove('cart');
            $session->remove('fullcost');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->deliveryTime > 0)
                $model->deliveryTime = date('Y-m-d H:i:s');
            else
                $model->deliveryTime = null;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Order model.
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
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
