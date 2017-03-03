<?php

namespace common\models;

use \common\models\base\Loj07Loja as BaseLoj07Loja;

/**
 * This is the model class for table "LOJ07_LOJA".
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
            [['LOJ07_CLIENTE_ID', 'LOJ07_NOME', 'LOJ07_DESCRICAO', 'LOJ07_EMAIL', 'LOJ07_HASH_PAGSEGURO', 'LOJ07_NICK_INSTAGRAM'], 'required'],
            [['LOJ07_CLIENTE_ID', 'LOJ07_CARTAO_MAX_PARC', 'LOJ07_FLG_BOLETO', 'LOJ07_STATUS'], 'integer'],
            [['LOJ07_FRETE'], 'number'],
            [['LOJ07_DT_INCLUSAO'], 'safe'],
            [['LOJ07_NOME', 'LOJ07_LOGO', 'LOJ07_EMAIL', 'LOJ07_HASH_PAGSEGURO'], 'string', 'max' => 100],
            [['LOJ07_DESCRICAO'], 'string', 'max' => 300],
            [['LOJ07_TELEFONE'], 'string', 'max' => 15],
            [['LOJ07_NICK_INSTAGRAM'], 'string', 'max' => 50],
            [['LOJ07_CLIENTE_ID'], 'unique'],
        ]);
    }
	
}
