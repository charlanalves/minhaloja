<?php

namespace common\models;

use \common\models\base\Loj14Status as BaseLoj14Status;

/**
 * This is the model class for table "loj14_status".
 */
class Loj14Status extends BaseLoj14Status
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ14_DESCRICAO'], 'required'],
            [['LOJ14_STATUS'], 'integer'],
            [['LOJ14_DESCRICAO'], 'string', 'max' => 100],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
