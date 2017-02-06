<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "adm04_fatura".
 *
 * @property integer $ADM04_ID
 * @property integer $ADM04_CLIENTE_ID
 * @property integer $ADM04_PLANO_ID
 * @property string $ADM04_VALOR
 * @property string $ADM04_DT_GERACAO
 * @property string $ADM04_DT_VENCIMENTO
 * @property integer $ADM04_STATUS
 */
class Adm04Fatura extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADM04_CLIENTE_ID', 'ADM04_PLANO_ID', 'ADM04_VALOR', 'ADM04_DT_VENCIMENTO'], 'required'],
            [['ADM04_CLIENTE_ID', 'ADM04_PLANO_ID', 'ADM04_STATUS'], 'integer'],
            [['ADM04_VALOR'], 'number'],
            [['ADM04_DT_GERACAO', 'ADM04_DT_VENCIMENTO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adm04_fatura';
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
            'ADM04_ID' => 'Adm04  ID',
            'ADM04_CLIENTE_ID' => 'Adm04  Cliente  ID',
            'ADM04_PLANO_ID' => 'Adm04  Plano  ID',
            'ADM04_VALOR' => 'Adm04  Valor',
            'ADM04_DT_GERACAO' => 'Adm04  Dt  Geracao',
            'ADM04_DT_VENCIMENTO' => 'Adm04  Dt  Vencimento',
            'ADM04_STATUS' => 'Adm04  Status',
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
     * @return \app\models\Adm04FaturaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Adm04FaturaQuery(get_called_class());
    }
}
