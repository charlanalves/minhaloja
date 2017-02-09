<?php

namespace common\models;

use \common\models\base\Loj04FormPagamento as BaseLoj04FormPagamento;

/**
 * This is the model class for table "loj04_form_pagamento".
 */
class Loj04FormPagamento extends BaseLoj04FormPagamento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ04_NOME', 'LOJ04_DESCRICAO', 'LOJ04_TIPO'], 'required'],
            [['LOJ04_TIPO', 'LOJ04_STATUS'], 'integer'],
            [['LOJ04_NOME'], 'string', 'max' => 50],
            [['LOJ04_DESCRICAO'], 'string', 'max' => 200],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
