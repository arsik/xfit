<?php
namespace frontend\controllers;

use app\models\Cards;
use app\models\City;
use app\models\Clubs;
use app\models\Duration;
use app\models\Viziting;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $city = City::find()->all();
        return $this->render('index', [
            'city' => $city,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    /*public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    /*public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }*/

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionOrder()
    {
        if(Yii::$app->request->isPost) {
            $session = Yii::$app->session;
            $session['orderFirst'] = Yii::$app->request->post();
            $clubs = Clubs::find()->where(['cityID' => $session['orderFirst']['city']])->all();
            return $this->render('order', [
                'clubs' => $clubs
            ]);
        }
        else
            return $this->redirect('index');
    }

    public function actionConfirm()
    {
        return $this->render('confirm');
    }

    public function actionClubs()
    {
        if(Yii::$app->request->isAjax) {
            $cityID = Yii::$app->request->get('city');
            if ($clubs = Clubs::find()->where(['cityID' => $cityID])->asArray()->all())
                return json_encode($clubs, JSON_UNESCAPED_UNICODE);
            else
                return 'No clubs in this city.';
        }
        return $this->redirect('index');
    }

    public function actionCards()
    {
        if(Yii::$app->request->isAjax) {
            $clubID = Yii::$app->request->get('club');
            if ($cards = Cards::find()->where(['clubID' => $clubID])->asArray()->all())
                return json_encode($cards, JSON_UNESCAPED_UNICODE);
            else
                return 'No cards in this club.';
        }
        return $this->redirect('index');
    }

    public function actionViziting()
    {
        if(Yii::$app->request->isAjax) {
            $vizitingID = Yii::$app->request->get('viziting');
            if ($vizitings = Viziting::find()->where(['id' => $vizitingID])->asArray()->one())
                return json_encode($vizitings, JSON_UNESCAPED_UNICODE);
            else
                return 'Viziting is not found';
        }
        return $this->redirect('index');
    }

    public function actionDuration()
    {
        if(Yii::$app->request->isAjax) {
            $durationID = Yii::$app->request->get('duration');
            if ($durations = Duration::find()->where(['id' => $durationID])->asArray()->one())
                return json_encode($durations, JSON_UNESCAPED_UNICODE);
            else
                return 'Duration is not found';
        }
        return $this->redirect('index');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    /*public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }*/

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    /*public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }*/
}
