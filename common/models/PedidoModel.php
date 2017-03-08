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
	
}
