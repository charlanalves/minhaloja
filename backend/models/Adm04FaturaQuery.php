<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Adm04Fatura]].
 *
 * @see \app\models\Adm04Fatura
 */
class Adm04FaturaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Adm04Fatura[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Adm04Fatura|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}