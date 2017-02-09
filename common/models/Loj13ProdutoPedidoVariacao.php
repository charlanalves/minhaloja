<?php

namespace common\models;

use \common\models\base\Loj13ProdutoPedidoVariacao as BaseLoj13ProdutoPedidoVariacao;

/**
 * This is the model class for table "loj13_produto_pedido_variacao".
 */
class Loj13ProdutoPedidoVariacao extends BaseLoj13ProdutoPedidoVariacao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ13_PRODUTO_PEDIDO_ID', 'LOJ13_VARIACAO_ID'], 'required'],
            [['LOJ13_PRODUTO_PEDIDO_ID', 'LOJ13_VARIACAO_ID'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
