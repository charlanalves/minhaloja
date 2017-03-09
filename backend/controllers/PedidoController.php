<?php

namespace backend\controllers;

use Yii;
use common\models\PedidoModel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



/**
 * PedidoController implements the CRUD actions for PedidoModel model.
 */
class PedidoController extends Controller
{
   public $enableCsrfValidation = false;
   
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
     * Lists all PedidoModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PedidoModel::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PedidoModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerLoj12ProdutoPedido = new \yii\data\ArrayDataProvider([
            'allModels' => $model->loj12ProdutoPedidos,
        ]);
        $providerLoj15StatusPedido = new \yii\data\ArrayDataProvider([
            'allModels' => $model->loj15StatusPedidos,
        ]);
        $providerLoj16Pagamento = new \yii\data\ArrayDataProvider([
            'allModels' => $model->loj16Pagamentos,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerLoj12ProdutoPedido' => $providerLoj12ProdutoPedido,
            'providerLoj15StatusPedido' => $providerLoj15StatusPedido,
            'providerLoj16Pagamento' => $providerLoj16Pagamento,
        ]);
    }

    /**
     * Creates a new PedidoModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    { 
        $model = new PedidoModel();
        $msg = 'Atualizado com sucesso';
        $status = true;
        
        $model->setAttributes(Yii::$app->request->post());
        
         if ( !$model->save() ) {
            $msg = 'Erro ao salvar o pedido.';
            $status = false;
             
         }
        
        exit(json_encode(['status' => $status, 'msg'=> $msg]));
    }

    /**
     * Updates an existing PedidoModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->LOJ11_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PedidoModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    
    /**
     * Finds the PedidoModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PedidoModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PedidoModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Loj12ProdutoPedido
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddLoj12ProdutoPedido()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Loj12ProdutoPedido');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formLoj12ProdutoPedido', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Loj15StatusPedido
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddLoj15StatusPedido()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Loj15StatusPedido');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formLoj15StatusPedido', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Loj16Pagamento
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddLoj16Pagamento()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Loj16Pagamento');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formLoj16Pagamento', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
