<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj05_form_pagamento_cliente".
 *
 * @property integer $LOJ05_ID
 * @property integer $LOJ05_FORM_PAGAMENTO_ID
 * @property integer $LOJ05_CLIENTE_ID
 * @property integer $LOJ05_STATUS
 * @property string $LOJ05_DT_INICIAL
 *
 * @property \common\models\Loj02Cliente $lOJ05CLIENTE
 * @property \common\models\Loj04FormPagamento $lOJ05FORMPAGAMENTO
 */
class Loj05FormPagamentoCliente extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ05_FORM_PAGAMENTO_ID', 'LOJ05_CLIENTE_ID'], 'required'],
            [['LOJ05_FORM_PAGAMENTO_ID', 'LOJ05_CLIENTE_ID', 'LOJ05_STATUS'], 'integer'],
            [['LOJ05_DT_INICIAL'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj05_form_pagamento_cliente';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOJ05_ID' => 'Loj05  ID',
            'LOJ05_FORM_PAGAMENTO_ID' => 'Loj05  Form  Pagamento  ID',
            'LOJ05_CLIENTE_ID' => 'Loj05  Cliente  ID',
            'LOJ05_STATUS' => 'Loj05  Status',
            'LOJ05_DT_INICIAL' => 'Loj05  Dt  Inicial',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ05CLIENTE()
    {
        return $this->hasOne(\common\models\Loj02Cliente::className(), ['LOJ02_ID' => 'LOJ05_CLIENTE_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ05FORMPAGAMENTO()
    {
        return $this->hasOne(\common\models\Loj04FormPagamento::className(), ['LOJ04_ID' => 'LOJ05_FORM_PAGAMENTO_ID']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj05FormPagamentoClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj05FormPagamentoClienteQuery(get_called_class());
    }
}
