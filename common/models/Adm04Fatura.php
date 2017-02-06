<?php

namespace common\models;

use \common\models\base\Adm04Fatura as BaseAdm04Fatura;

/**
 * This is the model class for table "adm04_fatura".
 */
class Adm04Fatura extends BaseAdm04Fatura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['ADM04_CLIENTE_ID', 'ADM04_PLANO_ID', 'ADM04_VALOR', 'ADM04_DT_VENCIMENTO'], 'required'],
            [['ADM04_CLIENTE_ID', 'ADM04_PLANO_ID', 'ADM04_STATUS'], 'integer'],
            [['ADM04_VALOR'], 'number'],
            [['ADM04_DT_GERACAO', 'ADM04_DT_VENCIMENTO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
