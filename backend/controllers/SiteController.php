<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

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
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'checkout','product-view'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'smartAdmin';
                
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            
            $abaProdPendentes = $this->renderPartial('aba-prod-pendentes');
            
            $abaProdAtivos = $this->renderPartial('aba-prod-ativos');
            
            $abaVendas = $this->renderPartial('aba-vendas');
            
            \Yii::$app->view->params['bloco-finalizar-venda'] = $this->renderPartial('finalizar-venda');

            
            return $this->render('tabs', [
                'model' => $model,
                'abaProdPendentes' => $abaProdPendentes,
                'abaProdAtivos' => $abaProdAtivos,
                'abaVendas' => $abaVendas,
            ]);
        }
    }
	
    public function actionCheckout()
    {
        $this->layout = 'smartAdminCheckout';            
        return $this->render('checkout');
    }

    public function actionProductView()
    {
        $this->layout = 'smartAdminCheckout';            
        return $this->render('product-view');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
