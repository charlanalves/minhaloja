<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj04_form_pagamento".
 *
 * @property integer $LOJ04_ID
 * @property string $LOJ04_NOME
 * @property string $LOJ04_DESCRICAO
 * @property integer $LOJ04_TIPO
 * @property integer $LOJ04_STATUS
 *
 * @property \common\models\Loj05FormPagamentoCliente[] $loj05FormPagamentoClientes
 */
class Loj04FormPagamento extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ04_NOME', 'LOJ04_DESCRICAO', 'LOJ04_TIPO'], 'required'],
            [['LOJ04_TIPO', 'LOJ04_STATUS'], 'integer'],
            [['LOJ04_NOME'], 'string', 'max' => 50],
            [['LOJ04_DESCRICAO'], 'string', 'max' => 200],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj04_form_pagamento';
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
            'LOJ04_ID' => 'Loj04  ID',
            'LOJ04_NOME' => 'Loj04  Nome',
            'LOJ04_DESCRICAO' => 'Loj04  Descricao',
            'LOJ04_TIPO' => 'Loj04  Tipo',
            'LOJ04_STATUS' => 'Loj04  Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj05FormPagamentoClientes()
    {
        return $this->hasMany(\common\models\Loj05FormPagamentoCliente::className(), ['LOJ05_FORM_PAGAMENTO_ID' => 'LOJ04_ID']);
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
     * @return \app\models\Loj04FormPagamentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj04FormPagamentoQuery(get_called_class());
    }
}
