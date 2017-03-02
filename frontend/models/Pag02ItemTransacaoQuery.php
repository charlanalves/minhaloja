<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Pag02ItemTransacao]].
 *
 * @see \app\models\Pag02ItemTransacao
 */
class Pag02ItemTransacaoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Pag02ItemTransacao[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Pag02ItemTransacao|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}