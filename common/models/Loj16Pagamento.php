<?php

namespace common\models;

use \common\models\base\Loj16Pagamento as BaseLoj16Pagamento;

/**
 * This is the model class for table "loj16_pagamento".
 */
class Loj16Pagamento extends BaseLoj16Pagamento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ16_PEDIDO_ID', 'LOJ16_USUARIO_ID', 'LOJ16_VALOR'], 'required'],
            [['LOJ16_PEDIDO_ID', 'LOJ16_USUARIO_ID', 'LOJ16_STATUS'], 'integer'],
            [['LOJ16_VALOR'], 'number'],
            [['LOJ16_DT_INCLUSAO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
