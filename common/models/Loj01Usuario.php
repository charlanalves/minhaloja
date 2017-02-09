<?php

namespace common\models;

use \common\models\base\Loj01Usuario as BaseLoj01Usuario;

/**
 * This is the model class for table "loj01_usuario".
 */
class Loj01Usuario extends BaseLoj01Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ01_NOME'], 'required'],
            [['LOJ01_STATUS'], 'integer'],
            [['LOJ01_DT_INCLUSAO'], 'safe'],
            [['LOJ01_NOME', 'LOJ01_TK_INSTAGRAM', 'LOJ01_TK_FACEBOOK', 'LOJ01_TK_GOOGLE'], 'string', 'max' => 200],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
