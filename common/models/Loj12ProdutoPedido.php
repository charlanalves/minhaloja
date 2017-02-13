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
            [['LOJ12_PRODUTO_ID', 'LOJ12_PEDIDO_ID'], 'required'],
            [['LOJ12_PRODUTO_ID', 'LOJ12_PEDIDO_ID', 'LOJ12_STATS'], 'integer'],
//            [['lock'], 'default', 'value' => '0'],
//            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
