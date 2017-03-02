<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Pag01Transacao]].
 *
 * @see \app\models\Pag01Transacao
 */
class Pag01TransacaoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Pag01Transacao[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Pag01Transacao|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}