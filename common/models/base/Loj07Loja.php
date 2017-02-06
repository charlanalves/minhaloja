<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj07_loja".
 *
 * @property integer $LOJ07_ID
 * @property integer $LOJ07_CLIENTE_ID
 * @property integer $LOJ07_NOME
 * @property string $LOJ07_DESCRICAO
 * @property string $LOJ07_LOGO
 * @property string $LOJ07_TELEFONE
 * @property string $LOJ07_EMAIL
 * @property integer $LOJ07_STATUS
 * @property string $LOJ07_DT_INCLUSAO
 *
 * @property \common\models\Loj02Cliente $lOJ07CLIENTE
 * @property \common\models\Loj08Produto[] $loj08Produtos
 */
class Loj07Loja extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ07_CLIENTE_ID', 'LOJ07_NOME', 'LOJ07_DESCRICAO', 'LOJ07_EMAIL'], 'required'],
            [['LOJ07_CLIENTE_ID', 'LOJ07_NOME', 'LOJ07_STATUS'], 'integer'],
            [['LOJ07_DT_INCLUSAO'], 'safe'],
            [['LOJ07_DESCRICAO'], 'string', 'max' => 300],
            [['LOJ07_LOGO', 'LOJ07_EMAIL'], 'string', 'max' => 100],
            [['LOJ07_TELEFONE'], 'string', 'max' => 15],
            [['LOJ07_CLIENTE_ID'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj07_loja';
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
            'LOJ07_ID' => 'Loj07  ID',
            'LOJ07_CLIENTE_ID' => 'Loj07  Cliente  ID',
            'LOJ07_NOME' => 'Loj07  Nome',
            'LOJ07_DESCRICAO' => 'Loj07  Descricao',
            'LOJ07_LOGO' => 'Loj07  Logo',
            'LOJ07_TELEFONE' => 'Loj07  Telefone',
            'LOJ07_EMAIL' => 'Loj07  Email',
            'LOJ07_STATUS' => 'Loj07  Status',
            'LOJ07_DT_INCLUSAO' => 'Loj07  Dt  Inclusao',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ07CLIENTE()
    {
        return $this->hasOne(\common\models\Loj02Cliente::className(), ['LOJ02_ID' => 'LOJ07_CLIENTE_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj08Produtos()
    {
        return $this->hasMany(\common\models\Loj08Produto::className(), ['LOJ08_LOJA_ID' => 'LOJ07_ID']);
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
     * @return \app\models\Loj07LojaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj07LojaQuery(get_called_class());
    }
}
