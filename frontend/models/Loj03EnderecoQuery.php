<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Loj03Endereco]].
 *
 * @see \app\models\Loj03Endereco
 */
class Loj03EnderecoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Loj03Endereco[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj03Endereco|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}