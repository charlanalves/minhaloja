<?php

namespace common\models;

use \common\models\base\Adm02Plano as BaseAdm02Plano;

/**
 * This is the model class for table "adm02_plano".
 */
class Adm02Plano extends BaseAdm02Plano
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['ADM02_NOME', 'ADM02_DESCRICAO', 'ADM02_VALOR'], 'required'],
            [['ADM02_VALOR'], 'number'],
            [['ADM02_STATUS'], 'integer'],
            [['ADM02_DT_INCLUSAO'], 'safe'],
            [['ADM02_NOME'], 'string', 'max' => 100],
            [['ADM02_DESCRICAO'], 'string', 'max' => 300],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
