<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Loj11Pedido]].
 *
 * @see \app\models\Loj11Pedido
 */
class Loj11PedidoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Loj11Pedido[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj11Pedido|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}