<?php

namespace common\models;

use \common\models\base\Adm05Pagamento as BaseAdm05Pagamento;

/**
 * This is the model class for table "adm05_pagamento".
 */
class Adm05Pagamento extends BaseAdm05Pagamento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['ADM05_FATURA_ID', 'ADM05_VALOR', 'ADM05_DT_PAGAMENTO'], 'required'],
            [['ADM05_FATURA_ID', 'ADM05_STATUS'], 'integer'],
            [['ADM05_VALOR'], 'number'],
            [['ADM05_DT_PAGAMENTO', 'ADM05_DT_INCLUSAO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
