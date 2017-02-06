<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Loj13ProdutoPedidoVariacao]].
 *
 * @see \app\models\Loj13ProdutoPedidoVariacao
 */
class Loj13ProdutoPedidoVariacaoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Loj13ProdutoPedidoVariacao[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj13ProdutoPedidoVariacao|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}