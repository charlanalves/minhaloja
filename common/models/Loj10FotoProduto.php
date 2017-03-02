<?php

namespace common\models;

use \common\models\base\Loj10FotoProduto as BaseLoj10FotoProduto;

/**
 * This is the model class for table "loj10_foto_produto".
 */
class Loj10FotoProduto extends BaseLoj10FotoProduto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ10_PRODUTO_ID', 'LOJ10_URL'], 'required'],
            [['LOJ10_PRODUTO_ID', 'LOJ10_STATUS'], 'integer'],
            [['LOJ10_DT_INCLUSAO'], 'safe'],
            [['LOJ10_URL'], 'string', 'max' => 100],
        ]);
    }
    
    /**
     * @inheritdoc
     * @return array - fotos ativas do produto
     */
    public static function getFotosAtivasByProduto($produto)
    {
        return self::findAll(['LOJ10_PRODUTO_ID' => $produto, 'LOJ10_STATUS' => 1]);
    }
    
}
