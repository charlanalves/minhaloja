<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
use common\models\GlobalModel;

/**
 * This is the base model class for table "loj11_pedido".
 *
 * @property integer $LOJ11_ID
 * @property integer $LOJ11_LOJA_ID
 * @property integer $LOJ11_USUARIO_ID
 * @property string $LOJ11_VALOR
 * @property integer $LOJ11_NUM_PARCELA
 * @property integer $LOJ11_STATUS
 * @property string $LOJ11_DT_INCLUSAO
 *
 * @property \common\models\Loj02Cliente $lOJ11CLIENTE
 * @property \common\models\Loj01Usuario $lOJ11USUARIO
 * @property \common\models\Loj12ProdutoPedido[] $loj12ProdutoPedidos
 * @property \common\models\Loj15StatusPedido[] $loj15StatusPedidos
 * @property \common\models\Loj14Status[] $lOJ15Statuses
 * @property \common\models\Loj16Pagamento[] $loj16Pagamentos
 */
class Loj11Pedido extends GlobalModel
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ11_LOJA_ID', 'LOJ11_USUARIO_ID', 'LOJ11_VALOR'], 'required'],
            [['LOJ11_LOJA_ID', 'LOJ11_USUARIO_ID', 'LOJ11_NUM_PARCELA', 'LOJ11_STATUS'], 'integer'],
            [['LOJ11_VALOR'], 'number'],
            [['LOJ11_DT_INCLUSAO'], 'safe'],
            [['LOJ11_FORMA_PAG'], 'string', 'max'=>50],
//            [['lock'], 'default', 'value' => '0'],
//            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj11_pedido';
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
            'LOJ11_ID' => 'Loj11  ID',
            'LOJ11_LOJA_ID' => 'Loj11  Loja  ID',
            'LOJ11_USUARIO_ID' => 'Loj11  Usuario  ID',
            'LOJ11_VALOR' => 'Loj11  Valor',
            'LOJ11_NUM_PARCELA' => 'Loj11  Num  Parcela',
            'LOJ11_STATUS' => 'Loj11  Status',
            'LOJ11_DT_INCLUSAO' => 'Loj11  Dt  Inclusao',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ11CLIENTE()
    {
        return $this->hasOne(\common\models\Loj07Loja::className(), ['LOJ07_ID' => 'LOJ11_LOJA_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ11USUARIO()
    {
        return $this->hasOne(\common\models\Loj01Usuario::className(), ['LOJ01_ID' => 'LOJ11_USUARIO_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj12ProdutoPedidos()
    {
        return $this->hasMany(\common\models\Loj12ProdutoPedido::className(), ['LOJ12_PEDIDO_ID' => 'LOJ11_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj15StatusPedidos()
    {
        return $this->hasMany(\common\models\Loj15StatusPedido::className(), ['LOJ15_PEDIDO_ID' => 'LOJ11_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ15Statuses()
    {
        return $this->hasMany(\common\models\Loj14Status::className(), ['LOJ14_ID' => 'LOJ15_STATUS_ID'])->viaTable('loj15_status_pedido', ['LOJ15_PEDIDO_ID' => 'LOJ11_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj16Pagamentos()
    {
        return $this->hasMany(\common\models\Loj16Pagamento::className(), ['LOJ16_PEDIDO_ID' => 'LOJ11_ID']);
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
                'createdAtAttribute' => 'LOJ11_DT_INCLUSAO',
//                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
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
     * @return \app\models\Loj11PedidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj11PedidoQuery(get_called_class());
    }
}
