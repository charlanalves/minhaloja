<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Adm05Pagamento]].
 *
 * @see \app\models\Adm05Pagamento
 */
class Adm05PagamentoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Adm05Pagamento[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Adm05Pagamento|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}