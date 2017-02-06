<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "adm03_cliente_plano".
 *
 * @property integer $ADM03_ID
 * @property integer $ADM03_PLANO_ID
 * @property integer $ADM03_CLIENTE_ID
 * @property integer $ADM03_DIA_VENC_FATURA
 * @property integer $ADM03_STATUS
 * @property string $ADM03_DT_INCLUSAO
 * @property string $ADM03_DT_TERMINO
 *
 * @property \common\models\Adm02Plano $aDM03PLANO
 */
class Adm03ClientePlano extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADM03_PLANO_ID', 'ADM03_CLIENTE_ID', 'ADM03_DIA_VENC_FATURA'], 'required'],
            [['ADM03_PLANO_ID', 'ADM03_CLIENTE_ID', 'ADM03_DIA_VENC_FATURA', 'ADM03_STATUS'], 'integer'],
            [['ADM03_DT_INCLUSAO', 'ADM03_DT_TERMINO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adm03_cliente_plano';
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
            'ADM03_ID' => 'Adm03  ID',
            'ADM03_PLANO_ID' => 'Adm03  Plano  ID',
            'ADM03_CLIENTE_ID' => 'Adm03  Cliente  ID',
            'ADM03_DIA_VENC_FATURA' => 'Adm03  Dia  Venc  Fatura',
            'ADM03_STATUS' => 'Adm03  Status',
            'ADM03_DT_INCLUSAO' => 'Adm03  Dt  Inclusao',
            'ADM03_DT_TERMINO' => 'Adm03  Dt  Termino',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getADM03PLANO()
    {
        return $this->hasOne(\common\models\Adm02Plano::className(), ['ADM02_ID' => 'ADM03_PLANO_ID']);
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
     * @return \app\models\Adm03ClientePlanoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Adm03ClientePlanoQuery(get_called_class());
    }
}
