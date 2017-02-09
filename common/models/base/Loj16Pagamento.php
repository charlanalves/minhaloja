<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj16_pagamento".
 *
 * @property integer $LOJ16_ID
 * @property integer $LOJ16_PEDIDO_ID
 * @property integer $LOJ16_USUARIO_ID
 * @property string $LOJ16_VALOR
 * @property integer $LOJ16_STATUS
 * @property string $LOJ16_DT_INCLUSAO
 *
 * @property \common\models\Loj01Usuario $lOJ16USUARIO
 * @property \common\models\Loj11Pedido $lOJ16PEDIDO
 */
class Loj16Pagamento extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ16_PEDIDO_ID', 'LOJ16_USUARIO_ID', 'LOJ16_VALOR'], 'required'],
            [['LOJ16_PEDIDO_ID', 'LOJ16_USUARIO_ID', 'LOJ16_STATUS'], 'integer'],
            [['LOJ16_VALOR'], 'number'],
            [['LOJ16_DT_INCLUSAO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj16_pagamento';
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
            'LOJ16_ID' => 'Loj16  ID',
            'LOJ16_PEDIDO_ID' => 'Loj16  Pedido  ID',
            'LOJ16_USUARIO_ID' => 'Loj16  Usuario  ID',
            'LOJ16_VALOR' => 'Loj16  Valor',
            'LOJ16_STATUS' => 'Loj16  Status',
            'LOJ16_DT_INCLUSAO' => 'Loj16  Dt  Inclusao',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ16USUARIO()
    {
        return $this->hasOne(\common\models\Loj01Usuario::className(), ['LOJ01_ID' => 'LOJ16_USUARIO_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ16PEDIDO()
    {
        return $this->hasOne(\common\models\Loj11Pedido::className(), ['LOJ11_ID' => 'LOJ16_PEDIDO_ID']);
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
     * @return \app\models\Loj16PagamentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj16PagamentoQuery(get_called_class());
    }
}
