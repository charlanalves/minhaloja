<?php

namespace common\models;

use \common\models\base\PedidoModel as BasePedidoModel;

/**
 * This is the model class for table "loj11_pedido".
 */
class PedidoModel extends BasePedidoModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ11_CLIENTE_ID', 'LOJ11_USUARIO_ID', 'LOJ11_VALOR'], 'required'],
            [['LOJ11_CLIENTE_ID', 'LOJ11_USUARIO_ID', 'LOJ11_NUM_PARCELA', 'LOJ11_STATUS'], 'integer'],
            [['LOJ11_VALOR'], 'number'],
            [['LOJ11_DT_INCLUSAO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
    
    public static function findPedidos()
    {
        $q =  "SELECT 
                DATE_FORMAT(LOJ11_DT_INCLUSAO, '%d/%m/%Y %H:%i') AS LOJ11_DT_INCLUSAO, 
                LOJ11_ID, 
                LOJ12_NOME_PRODUTO, 
                LOJ12_QTD, 
                CASE 
                    WHEN LOJ11_FORMA_PAG = 'b' then 'Boleto Bancário'
                    WHEN LOJ11_FORMA_PAG = 'c' then 'Cartão de Crédito'
                END AS LOJ11_FORMA_PAG
                , 
                LOJ12_VLR_UNID,                 
                CASE 
                    WHEN LOJ11_STATUS = 1 then 'Aguardando envio para o cliente'
                    WHEN LOJ11_STATUS = 'c' then 'Aguardando Pagamento'
                END AS LOJ11_STATUS,
                CASE 
                    WHEN LOJ11_FORMA_PAG = 'c' then CONCAT(LOJ11_NUM_PARCELA,' X DE ', ROUND(LOJ12_VLR_UNID / LOJ11_NUM_PARCELA))
                END AS VALOR_PARCELADO,
                LOJ11_CLIENTE_NOME,
                LOJ11_CLIENTE_EMAIL
            FROM loj11_pedido
            JOIN loj12_produto_pedido on loj12_produto_pedido.LOJ12_PEDIDO_ID = loj11_pedido.LOJ11_ID" ;      

        $connection = \Yii::$app->db;
        $command =  $connection->createCommand($q); 
        $teste = $command->queryAll();
                
        return $teste;
    }
	
}
