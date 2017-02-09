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
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
