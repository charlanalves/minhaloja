<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Adm03ClientePlano]].
 *
 * @see \app\models\Adm03ClientePlano
 */
class Adm03ClientePlanoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Adm03ClientePlano[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Adm03ClientePlano|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}