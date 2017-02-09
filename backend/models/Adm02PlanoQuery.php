<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Adm02Plano]].
 *
 * @see \app\models\Adm02Plano
 */
class Adm02PlanoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Adm02Plano[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Adm02Plano|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}