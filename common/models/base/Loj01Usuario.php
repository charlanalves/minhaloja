<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj01_usuario".
 *
 * @property integer $LOJ01_ID
 * @property string $LOJ01_NOME
 * @property string $LOJ01_TK_INSTAGRAM
 * @property string $LOJ01_TK_FACEBOOK
 * @property string $LOJ01_TK_GOOGLE
 * @property integer $LOJ01_STATUS
 * @property string $LOJ01_DT_INCLUSAO
 *
 * @property \common\models\Loj06UsuarioCliente[] $loj06UsuarioClientes
 * @property \common\models\Loj11Pedido[] $loj11Pedidos
 * @property \common\models\Loj16Pagamento[] $loj16Pagamentos
 */
class Loj01Usuario extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ01_NOME'], 'required'],
            [['LOJ01_STATUS'], 'integer'],
            [['LOJ01_DT_INCLUSAO'], 'safe'],
            [['LOJ01_NOME', 'LOJ01_TK_INSTAGRAM', 'LOJ01_TK_FACEBOOK', 'LOJ01_TK_GOOGLE'], 'string', 'max' => 200],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj01_usuario';
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
            'LOJ01_ID' => 'Loj01  ID',
            'LOJ01_NOME' => 'Loj01  Nome',
            'LOJ01_TK_INSTAGRAM' => 'Loj01  Tk  Instagram',
            'LOJ01_TK_FACEBOOK' => 'Loj01  Tk  Facebook',
            'LOJ01_TK_GOOGLE' => 'Loj01  Tk  Google',
            'LOJ01_STATUS' => 'Loj01  Status',
            'LOJ01_DT_INCLUSAO' => 'Loj01  Dt  Inclusao',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj06UsuarioClientes()
    {
        return $this->hasMany(\common\models\Loj06UsuarioCliente::className(), ['LOJ06_USUARIO_ID' => 'LOJ01_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj11Pedidos()
    {
        return $this->hasMany(\common\models\Loj11Pedido::className(), ['LOJ11_USUARIO_ID' => 'LOJ01_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj16Pagamentos()
    {
        return $this->hasMany(\common\models\Loj16Pagamento::className(), ['LOJ16_USUARIO_ID' => 'LOJ01_ID']);
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
     * @return \app\models\Loj01UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj01UsuarioQuery(get_called_class());
    }
}
