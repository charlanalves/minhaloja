<?php

namespace common\models;

use \common\models\base\Loj09VariacaoProduto as BaseLoj09VariacaoProduto;

/**
 * This is the model class for table "loj09_variacao_produto".
 */
class Loj09VariacaoProduto extends BaseLoj09VariacaoProduto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ09_PRODUTO_ID', 'LOJ09_DESCRICAO', 'LOJ09_GRUPO'], 'required'],
            [['LOJ09_PRODUTO_ID', 'LOJ09_GRUPO'], 'integer'],
            [['LOJ09_DESCRICAO'], 'string', 'max' => 100],
        ]);
    }
    
    /**
     * @inheritdoc
     * @return array - variações do produto
     */
    public static function getVariacoesByProduto($produto)
    {
        return self::findAll(['LOJ09_PRODUTO_ID' => $produto]);
    }
    
    /**
     * @inheritdoc
     * @return array - variações do produto agrupadas
     */
    public static function getVariacoesAgrupadasByProduto($produto)
    {
        $return = [];
        if(($v = self::getVariacoesByProduto($produto))){
            foreach ($v as $value) {
                $att = $value->attributes;
                $return[$att['LOJ09_GRUPO']][$att['LOJ09_ID']] = $att['LOJ09_DESCRICAO'];
            }
        }
        
        return $return;
    }
    
	
}
