<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Loj10FotoProduto]].
 *
 * @see \app\models\Loj10FotoProduto
 */
class Loj10FotoProdutoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Loj10FotoProduto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj10FotoProduto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}