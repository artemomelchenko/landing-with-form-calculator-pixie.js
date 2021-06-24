<?php
namespace frontend\controllers;

use common\models\Languages;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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

    public $enableCsrfValidation = false;

    public function actionIndex()
    {

        $post = Yii::$app->request->post();

        $lang = Yii::$app->language;

//        $language = Languages::findOne(['lang' => $lang]);

        $language = Languages::find()->with('products')->with('settings')->with('reviews')->where(['lang' => $lang])->one();
//        VarDumper::dump($language,10,1);

        if ($post){
            $token = '829088693:AAGAkMLgVS8BJFNuXNSuE0Myhrmvgl8g0fk';
            $chat_id = "-368831130";

            if ($post['value'] === 'callback'){

                $arr1 = [
                    'Форма: ' => 'Call Back',
                    'Язык' => $language->name,
                    'Имя: ' => isset($post['name']) ? $post['name'] : '',
                    'Город: ' => isset($post['city']) ? $post['city'] : '',
                    'Телефон: ' => isset($post['tel']) ? $post['tel'] : '',
                ];

                $txt = '';

                foreach($arr1 as $key => $value) {
                    $txt .= "<b>".$key."</b> ".$value."%0A";
                };

                $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
                return $this->redirect('/success');
            }

            if ($post['value'] === 'whatsapp'){

                $arr1 = [
                    'Форма: ' => 'WhatsApp',
                    'Язык' => $language->name,
                    'Имя: ' => isset($post['name']) ? $post['name'] : '',
                    'Город: ' => isset($post['city']) ? $post['city'] : '',
                    'Телефон: ' => isset($post['tel']) ? $post['tel'] : '',
                    'Сообщение: ' => isset($post['message']) ? $post['message'] : '',
                ];

                $txt = '';

                foreach($arr1 as $key => $value) {
                    $txt .= "<b>".$key."</b> ".$value."%0A";
                };

                $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
                return $this->redirect('/success');
            }

            if ($post['value'] === 'makeorder'){

                $json = Yii::$app->request->post('object');

                return $this->redirect(['buyform', 'data' => $json]);
            }
        }
        return $this->render('index', compact('language'));
    }

    public function actionPdf($model) {

        $filePath = '/web/certificates/';
        $completePath = Yii::getAlias('@app'.$filePath.'ArcticAir_R'.$model.'.pdf');

        return Yii::$app->response->sendFile($completePath, 'ArcticAir_'.$model.'.pdf', ['inline'=>true]);
    }

    public function actionBuyform($data)
    {

//        VarDumper::dump($data,10,1);

        $js = json_decode($data);

        $arr = [];

        foreach ($js as $key => $j){

            if ($j->count !== 0){
                $mult = $j->count * $j->price;
                $arr[] = $j;
                $arr['count'] += $j->count;
                $arr['price'] += $mult;
            }
        }

        $lang = Yii::$app->language;

        $language = Languages::findOne(['lang' => $lang]);

        $post = Yii::$app->request->post();

        if ($post['value'] === 'buyform'){

            $token = '829088693:AAGAkMLgVS8BJFNuXNSuE0Myhrmvgl8g0fk';
            $chat_id = "-368831130";

            $txt2 = '';

            $arr1 = [
                'Форма: ' => 'Buy Form',
                'Язык' => $language->name,
                'Имя: ' => isset($post['name']) ? $post['name'] : '',
                'Город: ' => isset($post['city']) ? $post['city'] : '',
                'Телефон: ' => isset($post['tel']) ? $post['tel'] : '',
                'Всего к-ство: ' => $arr['count'],
                'Всего цена: ' => $arr['price'],
            ];

            unset($arr['count']);
            unset($arr['price']);


            $txt = '';

            foreach($arr1 as $key => $value) {
                $txt .= "<b>".$key."</b> ".$value."%0A";
            };

            $a = 1;

            foreach ($arr as $k => $v){

                $txt2 .= "<b>". $a++ .". %0A</b><b>   -Модель: </b> ".$v->model."%0A";
                $txt2 .= "<b>   -К-ство: </b> ".$v->count."%0A";
                $txt2 .= "<b>   -Цена: </b> ".$v->price."%0A";
            }

            $txt = $txt ."". $txt2;

            $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
            return $this->redirect('/success');
        }
        return $this->render('buyform', ['data' => $arr]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
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
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSuccess()
    {
        return $this->render('success');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
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
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
