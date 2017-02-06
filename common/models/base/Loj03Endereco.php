<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj03_endereco".
 *
 * @property integer $LOJ03_ID
 * @property integer $LOJ03_CLIENTE_ID
 * @property string $LOJ03_LOGRADOURO
 * @property string $LOJ03_NUMERO
 * @property string $LOJ03_BAIRRO
 * @property string $LOJ03_CIDADE
 * @property string $LOJ03_UF
 * @property string $LOJ03_COMPLEMENTO
 * @property integer $LOJ03_STATUS
 * @property string $LOJ03_DT_INCLUSAO
 *
 * @property \common\models\Loj02Cliente $lOJ03CLIENTE
 */
class Loj03Endereco extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ03_CLIENTE_ID'], 'required'],
            [['LOJ03_CLIENTE_ID', 'LOJ03_STATUS'], 'integer'],
            [['LOJ03_DT_INCLUSAO'], 'safe'],
            [['LOJ03_LOGRADOURO', 'LOJ03_BAIRRO', 'LOJ03_CIDADE'], 'string', 'max' => 100],
            [['LOJ03_NUMERO', 'LOJ03_COMPLEMENTO'], 'string', 'max' => 50],
            [['LOJ03_UF'], 'string', 'max' => 2],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj03_endereco';
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
            'LOJ03_ID' => 'Loj03  ID',
            'LOJ03_CLIENTE_ID' => 'Loj03  Cliente  ID',
            'LOJ03_LOGRADOURO' => 'Loj03  Logradouro',
            'LOJ03_NUMERO' => 'Loj03  Numero',
            'LOJ03_BAIRRO' => 'Loj03  Bairro',
            'LOJ03_CIDADE' => 'Loj03  Cidade',
            'LOJ03_UF' => 'Loj03  Uf',
            'LOJ03_COMPLEMENTO' => 'Loj03  Complemento',
            'LOJ03_STATUS' => 'Loj03  Status',
            'LOJ03_DT_INCLUSAO' => 'Loj03  Dt  Inclusao',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ03CLIENTE()
    {
        return $this->hasOne(\common\models\Loj02Cliente::className(), ['LOJ02_ID' => 'LOJ03_CLIENTE_ID']);
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
     * @return \app\models\Loj03EnderecoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj03EnderecoQuery(get_called_class());
    }
}
