<?php

namespace common\models;

use common\models\base\Loj08Produto as BaseLoj08Produto;

/**
 * This is the model class for table "loj08_produto".
 */
class Loj08Produto extends BaseLoj08Produto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ08_LOJA_ID', 'LOJ08_NOME', 'LOJ08_PRECO'], 'required'],
            [['LOJ08_LOJA_ID', 'LOJ08_QTD_VIEW', 'LOJ08_QTD_COMPART', 'LOJ08_STATUS'], 'integer'],
            [['LOJ08_PRECO'], 'number'],
            [['LOJ08_DT_INCLUSAO'], 'safe'],
            [['LOJ08_NOME'], 'string', 'max' => 50],
            [['LOJ08_DESCRICAO'], 'string', 'max' => 300],
        ]);
    }
    
    /**
     * @inheritdoc
     * @return array - produtos ativos da loja
     */
    public static function getProdutosAtivosByLoja($loja)
    {
        return self::findAll(['LOJ08_LOJA_ID' => $loja, 'LOJ08_STATUS' => 1]);
    }
    
}
