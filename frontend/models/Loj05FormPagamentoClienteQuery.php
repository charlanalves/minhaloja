<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Loj05FormPagamentoCliente]].
 *
 * @see \app\models\Loj05FormPagamentoCliente
 */
class Loj05FormPagamentoClienteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Loj05FormPagamentoCliente[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj05FormPagamentoCliente|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}