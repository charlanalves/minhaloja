<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Adm01Usuario]].
 *
 * @see \app\models\Adm01Usuario
 */
class Adm01UsuarioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Adm01Usuario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Adm01Usuario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}