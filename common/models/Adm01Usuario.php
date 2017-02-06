<?php

namespace common\models;

use \common\models\base\Adm01Usuario as BaseAdm01Usuario;

/**
 * This is the model class for table "adm01_usuario".
 */
class Adm01Usuario extends BaseAdm01Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['ADM01_NOME', 'ADM01_EMAIL'], 'required'],
            [['ADM01_EMAIL'], 'integer'],
            [['ADM01_NOME'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
