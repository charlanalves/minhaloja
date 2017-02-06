<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Loj07Loja]].
 *
 * @see \app\models\Loj07Loja
 */
class Loj07LojaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Loj07Loja[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj07Loja|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}