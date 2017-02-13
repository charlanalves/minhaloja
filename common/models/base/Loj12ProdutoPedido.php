<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
use common\models\GlobalModel;

/**
 * This is the base model class for table "loj12_produto_pedido".
 *
 * @property integer $LOJ12_ID
 * @property integer $LOJ12_PRODUTO_ID
 * @property integer $LOJ12_PEDIDO_ID
 * @property integer $LOJ12_STATS
 *
 * @property \common\models\Loj08Produto $lOJ12PRODUTO
 * @property \common\models\Loj11Pedido $lOJ12PEDIDO
 * @property \common\models\Loj13ProdutoPedidoVariacao[] $loj13ProdutoPedidoVariacaos
 */
class Loj12ProdutoPedido extends GlobalModel
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ12_PRODUTO_ID', 'LOJ12_PEDIDO_ID'], 'required'],
            [['LOJ12_PRODUTO_ID', 'LOJ12_PEDIDO_ID', 'LOJ12_STATS'], 'integer'],
//            [['lock'], 'default', 'value' => '0'],
//            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj12_produto_pedido';
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
            'LOJ12_ID' => 'Loj12  ID',
            'LOJ12_PRODUTO_ID' => 'Loj12  Produto  ID',
            'LOJ12_PEDIDO_ID' => 'Loj12  Pedido  ID',
            'LOJ12_STATS' => 'Loj12  Stats',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ12PRODUTO()
    {
        return $this->hasOne(\common\models\Loj08Produto::className(), ['LOJ08_ID' => 'LOJ12_PRODUTO_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ12PEDIDO()
    {
        return $this->hasOne(\common\models\Loj11Pedido::className(), ['LOJ11_ID' => 'LOJ12_PEDIDO_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj13ProdutoPedidoVariacaos()
    {
        return $this->hasMany(\common\models\Loj13ProdutoPedidoVariacao::className(), ['LOJ13_PRODUTO_PEDIDO_ID' => 'LOJ12_ID']);
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
     * @return \app\models\Loj12ProdutoPedidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj12ProdutoPedidoQuery(get_called_class());
    }
}
