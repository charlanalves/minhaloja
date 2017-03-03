<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Loj14Status]].
 *
 * @see \app\models\Loj14Status
 */
class Loj14StatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Loj14Status[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj14Status|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}