<?php

namespace common\models;

use \common\models\base\Loj02Cliente as BaseLoj02Cliente;

/**
 * This is the model class for table "loj02_cliente".
 */
class Loj02Cliente extends BaseLoj02Cliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ02_NOME', 'LOJ02_DESCRICAO', 'LOJ02_TELEFONE', 'LOJ02_CELULAR', 'LOJ02_CPF', 'LOJ02_CNPJ'], 'required'],
            [['LOJ02_STATUS'], 'integer'],
            [['LOJ02_DT_INCLUSAO'], 'safe'],
            [['LOJ02_NOME'], 'string', 'max' => 100],
            [['LOJ02_DESCRICAO'], 'string', 'max' => 300],
            [['LOJ02_TELEFONE', 'LOJ02_CELULAR'], 'string', 'max' => 15],
            [['LOJ02_CPF'], 'string', 'max' => 14],
            [['LOJ02_CNPJ'], 'string', 'max' => 18],
            [['LOJ02_CPF'], 'unique'],
        ]);
    }
	
}
