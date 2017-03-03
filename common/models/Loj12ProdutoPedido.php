<?php

namespace common\models;

use \common\models\base\Loj12ProdutoPedido as BaseLoj12ProdutoPedido;

/**
 * This is the model class for table "loj12_produto_pedido".
 */
class Loj12ProdutoPedido extends BaseLoj12ProdutoPedido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ12_PRODUTO_ID', 'LOJ12_PEDIDO_ID', 'LOJ12_QTD'], 'required'],
            [['LOJ12_PRODUTO_ID', 'LOJ12_PEDIDO_ID', 'LOJ12_VARIACAO_ID', 'LOJ12_QTD'], 'integer'],
            [['LOJ12_VLR_UNID'], 'number'],
            [['LOJ12_NOME_PRODUTO'], 'string', 'max' => 100],
//            [['lock'], 'default', 'value' => '0'],
//            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function getProdutoPedido($pedido)
    {
        $sql = "SELECT LOJ08_PRODUTO.LOJ08_ID,
                LOJ12_PRODUTO_PEDIDO.LOJ12_QTD,
                LOJ12_PRODUTO_PEDIDO.LOJ12_VLR_UNID,
                LOJ12_PRODUTO_PEDIDO.LOJ12_NOME_PRODUTO,
                LOJ08_PRODUTO.LOJ08_DESCRICAO,
                LOJ09_VARIACAO_PRODUTO.LOJ09_DESCRICAO,
                LOJ09_VARIACAO_PRODUTO.LOJ09_GRUPO,
                LOJ10_FOTO_PRODUTO.LOJ10_URL
                FROM LOJ12_PRODUTO_PEDIDO
                LEFT JOIN LOJ08_PRODUTO ON(LOJ08_PRODUTO.LOJ08_ID = LOJ12_PRODUTO_PEDIDO.LOJ12_PRODUTO_ID)
                LEFT JOIN LOJ09_VARIACAO_PRODUTO ON(LOJ09_VARIACAO_PRODUTO.LOJ09_ID = LOJ12_PRODUTO_PEDIDO.LOJ12_VARIACAO_ID)
                LEFT JOIN LOJ10_FOTO_PRODUTO ON(LOJ10_FOTO_PRODUTO.LOJ10_PRODUTO_ID = LOJ08_PRODUTO.LOJ08_ID AND LOJ10_FOTO_PRODUTO.LOJ10_STATUS = 1)
                WHERE LOJ12_PRODUTO_PEDIDO.LOJ12_PEDIDO_ID = :pedido";

        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $command->bindValue(':pedido', $pedido);
        return $command->query()->readAll();
    }
}
