<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "adm05_pagamento".
 *
 * @property integer $ADM05_ID
 * @property integer $ADM05_FATURA_ID
 * @property string $ADM05_VALOR
 * @property string $ADM05_DT_PAGAMENTO
 * @property string $ADM05_DT_INCLUSAO
 * @property integer $ADM05_STATUS
 */
class Adm05Pagamento extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADM05_FATURA_ID', 'ADM05_VALOR', 'ADM05_DT_PAGAMENTO'], 'required'],
            [['ADM05_FATURA_ID', 'ADM05_STATUS'], 'integer'],
            [['ADM05_VALOR'], 'number'],
            [['ADM05_DT_PAGAMENTO', 'ADM05_DT_INCLUSAO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adm05_pagamento';
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
            'ADM05_ID' => 'Adm05  ID',
            'ADM05_FATURA_ID' => 'Adm05  Fatura  ID',
            'ADM05_VALOR' => 'Adm05  Valor',
            'ADM05_DT_PAGAMENTO' => 'Adm05  Dt  Pagamento',
            'ADM05_DT_INCLUSAO' => 'Adm05  Dt  Inclusao',
            'ADM05_STATUS' => 'Adm05  Status',
        ];
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
     * @return \app\models\Adm05PagamentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Adm05PagamentoQuery(get_called_class());
    }
}
