<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Loj12ProdutoPedido]].
 *
 * @see \app\models\Loj12ProdutoPedido
 */
class Loj12ProdutoPedidoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Loj12ProdutoPedido[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj12ProdutoPedido|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}