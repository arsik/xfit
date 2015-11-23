<?php

namespace backend\controllers;

use Yii;
use app\models\Cards;
use app\models\SearchCards;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * CardsController implements the CRUD actions for Cards model.
 */
class CardsController extends Controller
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
     * Lists all Cards models.
     * @return mixed
     */

    public function actionIndex()
    {
        if(Yii::$app->session->get('manager') != 2)
            throw new ForbiddenHttpException('Доступ запрещен');

        $searchModel = new SearchCards();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cards model.
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
     * Creates a new Cards model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cards();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionAdd() {
        $session = Yii::$app->session;
        if(!Yii::$app->request->get('cardID') || mb_strlen(Yii::$app->request->get('fio')) < 10) {
            $session['error_add'] += 1;
            return $this->redirect('/');
        }
        if(!$session->get('session_order')) $session['session_order'] = rand(1000,10000);
        if(!$session->get('cart')) $session['cart'] = new \ArrayObject;
        if(!$session->get('cart_fio')) $session['cart_fio'] = new \ArrayObject;
        $thisCard = Cards::find()->where(['id' => Yii::$app->request->get('cardID')])->one();
        $session['cards'] += 1;
        $session['fullcost'] += $thisCard->cost;
        $session['cart'][] = Yii::$app->request->get('cardID');
        $session['cart_fio'][] = Yii::$app->request->get('fio');
        return $this->redirect('/');
    }
    public function actionClear() {
        $session = Yii::$app->session;
        $session->remove('cards');
        $session->remove('session_order');
        $session->remove('cart');
        $session->remove('cart_fio');
        $session->remove('fullcost');
        return $this->redirect('/');
    }

    /**
     * Updates an existing Cards model.
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
     * Deletes an existing Cards model.
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
     * Finds the Cards model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cards the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cards::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
