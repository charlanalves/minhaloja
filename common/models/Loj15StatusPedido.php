<?php

namespace common\models;

use \common\models\base\Loj15StatusPedido as BaseLoj15StatusPedido;

/**
 * This is the model class for table "loj15_status_pedido".
 */
class Loj15StatusPedido extends BaseLoj15StatusPedido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ15_STATUS_ID', 'LOJ15_PEDIDO_ID'], 'required'],
            [['LOJ15_STATUS_ID', 'LOJ15_PEDIDO_ID', 'LOJ15_STATUS'], 'integer'],
            [['LOJ15_DT_INCLUSAO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
