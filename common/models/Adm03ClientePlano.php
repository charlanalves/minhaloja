<?php

namespace common\models;

use \common\models\base\Adm03ClientePlano as BaseAdm03ClientePlano;

/**
 * This is the model class for table "adm03_cliente_plano".
 */
class Adm03ClientePlano extends BaseAdm03ClientePlano
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['ADM03_PLANO_ID', 'ADM03_CLIENTE_ID', 'ADM03_DIA_VENC_FATURA'], 'required'],
            [['ADM03_PLANO_ID', 'ADM03_CLIENTE_ID', 'ADM03_DIA_VENC_FATURA', 'ADM03_STATUS'], 'integer'],
            [['ADM03_DT_INCLUSAO', 'ADM03_DT_TERMINO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
