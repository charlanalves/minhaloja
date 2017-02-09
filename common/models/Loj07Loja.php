<?php

namespace common\models;

use \common\models\base\Loj07Loja as BaseLoj07Loja;

/**
 * This is the model class for table "loj07_loja".
 */
class Loj07Loja extends BaseLoj07Loja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ07_CLIENTE_ID', 'LOJ07_NOME', 'LOJ07_DESCRICAO', 'LOJ07_EMAIL'], 'required'],
            [['LOJ07_CLIENTE_ID', 'LOJ07_NOME', 'LOJ07_STATUS'], 'integer'],
            [['LOJ07_DT_INCLUSAO'], 'safe'],
            [['LOJ07_DESCRICAO'], 'string', 'max' => 300],
            [['LOJ07_LOGO', 'LOJ07_EMAIL'], 'string', 'max' => 100],
            [['LOJ07_TELEFONE'], 'string', 'max' => 15],
            [['LOJ07_CLIENTE_ID'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
