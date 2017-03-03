<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Loj16Pagamento]].
 *
 * @see \app\models\Loj16Pagamento
 */
class Loj16PagamentoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Loj16Pagamento[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj16Pagamento|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}