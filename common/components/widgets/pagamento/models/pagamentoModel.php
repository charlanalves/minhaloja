<?php

namespace common\widgets\pagamento\models;

use yii\db\ActiveQuery;
use \yii\db\Exception;

class pagamentoModel extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PAG01_TRANSACAO';
    }
    
    /**
     * @inheritdoc
    */
    public static function primaryKey()
    {
        return ['ID_TRANSACAO'];
    }
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
        [
            [['ID_TRANSACAO'], 'unique'],
        ]);
    }


}
