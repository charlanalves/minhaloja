<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\PedidoModel]].
 *
 * @see \app\models\PedidoModel
 */
class PedidoModelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\PedidoModel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\PedidoModel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}