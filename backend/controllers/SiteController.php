<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\PedidoModel;



/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    
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
                        'actions' => ['login', 'error', 'checkout','product-view','enviar-email'],
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

    
    public function actionEnviarEmail()
    {
       $email = $request = Yii::$app->request->post('value');
       
       if (empty($email)) {
             throw new \yii\web\HttpException(500, 'O email não pode estar vazio.');
       }
       
      $retorno = \Yii::$app->mailer->compose()
            ->setFrom($email)
            ->setTo('eduardomatias.1989@gmail.com')
            ->setSubject('[MINHA LOJA] PRIMEIRA COBRANCA MINHA LOJA!!!!!!')            
            ->setHtmlBody($this->templateEmail())
            ->send();
       $a = 1;
    }
    
    public function templateEmail()
    {
        return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>[SUBJECT]</title>
      <style type="text/css">
      body {
       padding-top: 0 !important;
       padding-bottom: 0 !important;
       padding-top: 0 !important;
       padding-bottom: 0 !important;
       margin:0 !important;
       width: 100% !important;
       -webkit-text-size-adjust: 100% !important;
       -ms-text-size-adjust: 100% !important;
       -webkit-font-smoothing: antialiased !important;
     }
     .tableContent img {
       border: 0 !important;
       display: block !important;
       outline: none !important;
     }
     a{
      color:#382F2E;
    }

    p, h1{
      color:#382F2E;
      margin:0;
    }
 p{
      text-align:left;
      color:#999999;
      font-size:14px;
      font-weight:normal;
      line-height:19px;
    }

    a.link1{
      color:#382F2E;
    }
    a.link2{
      font-size:16px;
      text-decoration:none;
      color:#ffffff;
    }

    h2{
      text-align:left;
       color:#222222; 
       font-size:19px;
      font-weight:normal;
    }
    div,p,ul,h1{
      margin:0;
    }

    .bgBody{
      background: #ffffff;
    }
    .bgItem{
      background: #ffffff;
    }
	
@media only screen and (max-width:480px)
		
{
		
table[class="MainContainer"], td[class="cell"] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class="specbundle"] 
	{
		width:100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:15px !important;
	}
		
td[class="spechide"] 
	{
		display:none !important;
	}
	    img[class="banner"] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class="left_pad"] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		 
}
	
@media only screen and (max-width:540px) 

{
		
table[class="MainContainer"], td[class="cell"] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class="specbundle"] 
	{
		width:100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:15px !important;
	}
		
td[class="spechide"] 
	{
		display:none !important;
	}
	    img[class="banner"] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
	.font {
		font-size:18px !important;
		line-height:22px !important;
		
		}
		.font1 {
		font-size:18px !important;
		line-height:22px !important;
		
		}
}

    </style>
<script type="colorScheme" class="swatch active">
{
    "name":"Default",
    "bgBody":"ffffff",
    "link":"382F2E",
    "color":"999999",
    "bgItem":"ffffff",
    "title":"222222"
}
</script>
  </head>
  <body paddingwidth="0" paddingheight="0"   style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
    <table bgcolor="#ffffff" width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent" align="center"  style="font-family:Helvetica, Arial,serif;">
  <tbody>
    <tr>
      <td><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" class="MainContainer">
  <tbody>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="40">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
  <!-- =============================== Header ====================================== -->   
    <tr>
    	<td height="75" class="spechide"></td>
        
        <!-- =============================== Body ====================================== -->
    </tr>
    <tr>
      <td class="movableContentContainer" valign="top">
      	<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="35"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" align="center" class="specbundle"><div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable">
                                  <p style="text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#222222;"><span class="specbundle2"><span class="font1"></span></span></p>
                                </div>
                              </div></td>
      <td valign="top" class="specbundle"><div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable">
                                  <p style="text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#289CDC;"><span class="font">[COBRANÇA DA LOJA DA MARIA]</span> </p>
                                </div>
                              </div></td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
        </div>
        <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                          <tr>
                            <td valign="top" align="center">
                              <div class="contentEditableContainer contentImageEditable">
                                <div class="contentEditable">
                                  <img src="https://s23.postimg.org/co0fle3mj/line.png" width="251" height="43" alt="" data-default="placeholder" data-max-width="560">
                                </div>
                              </div>
                            </td>
                          </tr>
                        </table>
        </div>
        <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                          <tr><td height="55"></td></tr>
                          <tr>
                            <td align="left">
                              <div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable" align="center">
                                  <h2 >Chegou a cobrança do Vestido Azul!</h2>
                                </div>
                              </div>
                            </td>
                          </tr>

                          <tr><td height="15"> </td></tr>

                          <tr>
                            <td align="left">
                              <div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable" align="center">
                                  <p >
                                    É claro que a necessidade de renovação processual assume importantes posições no estabelecimento dos modos de operação convencionais <a target="_blank" href="#" class="link1" >Clique aqui</a> mais um poouco de leroro para enrolar no email. 
                                    <br>
                                    <br>
                                    O que temos que ter sempre em mente é que o consenso.
                                    <br>
                                    <br>
                                    Atenciosamente,
                                    <br>
                                    <span style="color:#222222;">Peter Parker</span>
                                  </p>
                                </div>
                              </div>
                            </td>
                          </tr>

                          <tr><td height="55"></td></tr>

                          <tr>
                            <td align="center">
                              <table>
                                <tr>
                                  <td align="center" bgcolor="#289CDC" style="background:#1A54BA; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
                                    <div class="contentEditableContainer" contentTextEditable">
                                      <div class="contentEditable" align="center">
                                        <a target="_blank" href="#" class="link2" style="color:#ffffff;">PAGAR AGORA</a>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          <tr><td height="20"></td></tr>
                        </table>
        </div>
        <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="65">
    </tr>
    <tr>
      <td  style="border-bottom:1px solid #DDDDDD;"></td>
    </tr>
    <tr><td height="25"></td></tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" class="specbundle"><div class="contentEditableContainer contentTextEditable">
                                      <div class="contentEditable" align="center">
                                        <p  style="text-align:left;color:#CCCCCC;font-size:12px;font-weight:normal;line-height:20px;">
                                          <span style="font-weight:bold;">COBRANÇA GERADA PELA MINHA LOJA S.A</span>
                                          <br>
                                          AVENIDA AFONSO PENA 1058, PREDIO CHICK 2° E 3º ANDAR CEP 31650-220 BELO HORIZONTE - MG
                                          <br>
                                          <a target="_blank" href="[FORWARD]">Forward to a friend</a><br>
                                          <a target="_blank" class="link1" class="color:#382F2E;" href="[UNSUBSCRIBE]">Unsubscribe</a>
                                          <br>
                                          <a target="_blank" class="link1" class="color:#382F2E;" href="[SHOWEMAIL]">Show this email in your browser</a>
                                        </p>
                                      </div>
                                    </div></td>
      <td valign="top" width="30" class="specbundle">&nbsp;</td>
      <td valign="top" class="specbundle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="52">
                                    <div class="contentEditableContainer contentFacebookEditable">
                                      <div class="contentEditable">
                                        <a target="_blank" href="#"><img src="https://s16.postimg.org/hmepdx16t/facebook.png" width="52" height="53" alt="facebook icon" data-default="placeholder" data-max-width="52" data-customIcon="true"></a>
                                      </div>
                                    </div>
                                  </td>
      <td valign="top" width="16">&nbsp;</td>
      <td valign="top" width="52">
                                    <div class="contentEditableContainer contentTwitterEditable">
                                      <div class="contentEditable">
                                        <a target="_blank" href="#"><img src="https://s7.postimg.org/dumwe9cwb/twitter.png" width="52" height="53" alt="twitter icon" data-default="placeholder" data-max-width="52" data-customIcon="true"></a>
                                      </div>
                                    </div>
                                  </td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    <tr><td height="88"></td></tr>
  </tbody>
</table>

        </div>
        
        <!-- =============================== footer ====================================== -->
      
      </td>
    </tr>
  </tbody>
</table>
</td>
      <td valign="top" width="40">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>

      </body>
      </html>

';
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
           
            $pedidos = \common\models\PedidoModel::findPedidos();
             
            
            $abaProdPendentes = $this->renderPartial('aba-prod-pendentes');
            
            $abaProdAtivos = $this->renderPartial('aba-prod-ativos');
            
            $abaVendas = $this->renderPartial('aba-vendas', ['pedidos' => $pedidos]);
            
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
