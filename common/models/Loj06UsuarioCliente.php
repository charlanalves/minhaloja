<?php

namespace common\models;

use \common\models\base\Loj06UsuarioCliente as BaseLoj06UsuarioCliente;

/**
 * This is the model class for table "loj06_usuario_cliente".
 */
class Loj06UsuarioCliente extends BaseLoj06UsuarioCliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ06_USUARIO_ID', 'LOJ06_CLIENTE_ID'], 'required'],
            [['LOJ06_USUARIO_ID', 'LOJ06_CLIENTE_ID', 'LOJ06_STATUS'], 'integer'],
            [['LOJ06_DT_INCLUSAO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
