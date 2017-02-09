<?php

namespace common\models;

use \common\models\base\Loj05FormPagamentoCliente as BaseLoj05FormPagamentoCliente;

/**
 * This is the model class for table "loj05_form_pagamento_cliente".
 */
class Loj05FormPagamentoCliente extends BaseLoj05FormPagamentoCliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ05_FORM_PAGAMENTO_ID', 'LOJ05_CLIENTE_ID'], 'required'],
            [['LOJ05_FORM_PAGAMENTO_ID', 'LOJ05_CLIENTE_ID', 'LOJ05_STATUS'], 'integer'],
            [['LOJ05_DT_INICIAL'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
