<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "adm02_plano".
 *
 * @property integer $ADM02_ID
 * @property string $ADM02_NOME
 * @property string $ADM02_DESCRICAO
 * @property string $ADM02_VALOR
 * @property integer $ADM02_STATUS
 * @property string $ADM02_DT_INCLUSAO
 *
 * @property \common\models\Adm03ClientePlano[] $adm03ClientePlanos
 */
class Adm02Plano extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADM02_NOME', 'ADM02_DESCRICAO', 'ADM02_VALOR'], 'required'],
            [['ADM02_VALOR'], 'number'],
            [['ADM02_STATUS'], 'integer'],
            [['ADM02_DT_INCLUSAO'], 'safe'],
            [['ADM02_NOME'], 'string', 'max' => 100],
            [['ADM02_DESCRICAO'], 'string', 'max' => 300],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adm02_plano';
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
            'ADM02_ID' => 'Adm02  ID',
            'ADM02_NOME' => 'Adm02  Nome',
            'ADM02_DESCRICAO' => 'Adm02  Descricao',
            'ADM02_VALOR' => 'Adm02  Valor',
            'ADM02_STATUS' => 'Adm02  Status',
            'ADM02_DT_INCLUSAO' => 'Adm02  Dt  Inclusao',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdm03ClientePlanos()
    {
        return $this->hasMany(\common\models\Adm03ClientePlano::className(), ['ADM03_PLANO_ID' => 'ADM02_ID']);
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
     * @return \app\models\Adm02PlanoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Adm02PlanoQuery(get_called_class());
    }
}
