<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Loj08Produto]].
 *
 * @see \app\models\Loj08Produto
 */
class Loj08ProdutoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Loj08Produto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj08Produto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}