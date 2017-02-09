<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj06_usuario_cliente".
 *
 * @property integer $LOJ06_ID
 * @property integer $LOJ06_USUARIO_ID
 * @property integer $LOJ06_CLIENTE_ID
 * @property string $LOJ06_DT_INCLUSAO
 * @property integer $LOJ06_STATUS
 *
 * @property \common\models\Loj02Cliente $lOJ06CLIENTE
 * @property \common\models\Loj01Usuario $lOJ06USUARIO
 */
class Loj06UsuarioCliente extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ06_USUARIO_ID', 'LOJ06_CLIENTE_ID'], 'required'],
            [['LOJ06_USUARIO_ID', 'LOJ06_CLIENTE_ID', 'LOJ06_STATUS'], 'integer'],
            [['LOJ06_DT_INCLUSAO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj06_usuario_cliente';
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
            'LOJ06_ID' => 'Loj06  ID',
            'LOJ06_USUARIO_ID' => 'Loj06  Usuario  ID',
            'LOJ06_CLIENTE_ID' => 'Loj06  Cliente  ID',
            'LOJ06_DT_INCLUSAO' => 'Loj06  Dt  Inclusao',
            'LOJ06_STATUS' => 'Loj06  Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ06CLIENTE()
    {
        return $this->hasOne(\common\models\Loj02Cliente::className(), ['LOJ02_ID' => 'LOJ06_CLIENTE_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ06USUARIO()
    {
        return $this->hasOne(\common\models\Loj01Usuario::className(), ['LOJ01_ID' => 'LOJ06_USUARIO_ID']);
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
     * @return \app\models\Loj06UsuarioClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj06UsuarioClienteQuery(get_called_class());
    }
}
