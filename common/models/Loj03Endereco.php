<?php

namespace common\models;

use \common\models\base\Loj03Endereco as BaseLoj03Endereco;

/**
 * This is the model class for table "loj03_endereco".
 */
class Loj03Endereco extends BaseLoj03Endereco
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ03_CLIENTE_ID'], 'required'],
            [['LOJ03_CLIENTE_ID', 'LOJ03_STATUS'], 'integer'],
            [['LOJ03_DT_INCLUSAO'], 'safe'],
            [['LOJ03_LOGRADOURO', 'LOJ03_BAIRRO', 'LOJ03_CIDADE'], 'string', 'max' => 100],
            [['LOJ03_NUMERO', 'LOJ03_COMPLEMENTO'], 'string', 'max' => 50],
            [['LOJ03_UF'], 'string', 'max' => 2],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
