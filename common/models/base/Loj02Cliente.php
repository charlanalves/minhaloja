<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj02_cliente".
 *
 * @property integer $LOJ02_ID
 * @property string $LOJ02_NOME
 * @property string $LOJ02_DESCRICAO
 * @property string $LOJ02_TELEFONE
 * @property string $LOJ02_CELULAR
 * @property integer $LOJ02_STATUS
 * @property string $LOJ02_DT_INCLUSAO
 * @property string $LOJ02_CPF
 * @property string $LOJ02_CNPJ
 *
 * @property \common\models\Loj03Endereco[] $loj03Enderecos
 * @property \common\models\Loj05FormPagamentoCliente[] $loj05FormPagamentoClientes
 * @property \common\models\Loj06UsuarioCliente[] $loj06UsuarioClientes
 * @property \common\models\Loj07Loja $loj07Loja
 * @property \common\models\Loj11Pedido[] $loj11Pedidos
 */
class Loj02Cliente extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ02_NOME', 'LOJ02_DESCRICAO', 'LOJ02_TELEFONE', 'LOJ02_CELULAR', 'LOJ02_CPF', 'LOJ02_CNPJ'], 'required'],
            [['LOJ02_STATUS'], 'integer'],
            [['LOJ02_DT_INCLUSAO'], 'safe'],
            [['LOJ02_NOME'], 'string', 'max' => 100],
            [['LOJ02_DESCRICAO'], 'string', 'max' => 300],
            [['LOJ02_TELEFONE', 'LOJ02_CELULAR'], 'string', 'max' => 15],
            [['LOJ02_CPF'], 'string', 'max' => 14],
            [['LOJ02_CNPJ'], 'string', 'max' => 18],
            [['LOJ02_CPF'], 'unique'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj02_cliente';
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
            'LOJ02_ID' => 'Loj02  ID',
            'LOJ02_NOME' => 'Loj02  Nome',
            'LOJ02_DESCRICAO' => 'Loj02  Descricao',
            'LOJ02_TELEFONE' => 'Loj02  Telefone',
            'LOJ02_CELULAR' => 'Loj02  Celular',
            'LOJ02_STATUS' => 'Loj02  Status',
            'LOJ02_DT_INCLUSAO' => 'Loj02  Dt  Inclusao',
            'LOJ02_CPF' => 'Loj02  Cpf',
            'LOJ02_CNPJ' => 'Loj02  Cnpj',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj03Enderecos()
    {
        return $this->hasMany(\common\models\Loj03Endereco::className(), ['LOJ03_CLIENTE_ID' => 'LOJ02_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj05FormPagamentoClientes()
    {
        return $this->hasMany(\common\models\Loj05FormPagamentoCliente::className(), ['LOJ05_CLIENTE_ID' => 'LOJ02_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj06UsuarioClientes()
    {
        return $this->hasMany(\common\models\Loj06UsuarioCliente::className(), ['LOJ06_CLIENTE_ID' => 'LOJ02_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj07Loja()
    {
        return $this->hasOne(\common\models\Loj07Loja::className(), ['LOJ07_CLIENTE_ID' => 'LOJ02_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj11Pedidos()
    {
        return $this->hasMany(\common\models\Loj11Pedido::className(), ['LOJ11_CLIENTE_ID' => 'LOJ02_ID']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
//            'timestamp' => [
//                'class' => TimestampBehavior::className(),
//                'createdAtAttribute' => 'created_at',
//                'updatedAtAttribute' => 'updated_at',
//                'value' => new \yii\db\Expression('NOW()'),
//            ],
//            'blameable' => [
//                'class' => BlameableBehavior::className(),
//                'createdByAttribute' => 'created_by',
//                'updatedByAttribute' => 'updated_by',
//            ],
//            'uuid' => [
//                'class' => UUIDBehavior::className(),
//                'column' => 'id',
//            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\Loj02ClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj02ClienteQuery(get_called_class());
    }
}
