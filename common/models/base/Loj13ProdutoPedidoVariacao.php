<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj13_produto_pedido_variacao".
 *
 * @property integer $LOJ13_ID
 * @property integer $LOJ13_PRODUTO_PEDIDO_ID
 * @property integer $LOJ13_VARIACAO_ID
 *
 * @property \common\models\Loj12ProdutoPedido $lOJ13PRODUTOPEDIDO
 * @property \common\models\Loj09VariacaoProduto $lOJ13VARIACAO
 */
class Loj13ProdutoPedidoVariacao extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ13_PRODUTO_PEDIDO_ID', 'LOJ13_VARIACAO_ID'], 'required'],
            [['LOJ13_PRODUTO_PEDIDO_ID', 'LOJ13_VARIACAO_ID'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj13_produto_pedido_variacao';
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
            'LOJ13_ID' => 'Loj13  ID',
            'LOJ13_PRODUTO_PEDIDO_ID' => 'Loj13  Produto  Pedido  ID',
            'LOJ13_VARIACAO_ID' => 'Loj13  Variacao  ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ13PRODUTOPEDIDO()
    {
        return $this->hasOne(\common\models\Loj12ProdutoPedido::className(), ['LOJ12_ID' => 'LOJ13_PRODUTO_PEDIDO_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ13VARIACAO()
    {
        return $this->hasOne(\common\models\Loj09VariacaoProduto::className(), ['LOJ09_ID' => 'LOJ13_VARIACAO_ID']);
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
     * @return \app\models\Loj13ProdutoPedidoVariacaoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj13ProdutoPedidoVariacaoQuery(get_called_class());
    }
}
