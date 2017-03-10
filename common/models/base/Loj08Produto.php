<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj08_produto".
 *
 * @property integer $LOJ08_ID
 * @property integer $LOJ08_LOJA_ID
 * @property string $LOJ08_NOME
 * @property string $LOJ08_DESCRICAO
 * @property string $LOJ08_PRECO
 * @property integer $LOJ08_QTD_LIKE
 * @property integer $LOJ08_QTD_COMPART
 * @property integer $LOJ08_STATUS
 * @property string $LOJ08_DT_INCLUSAO
 *
 * @property \common\models\Loj07Loja $lOJ08LOJA
 * @property \common\models\Loj09VariacaoProduto[] $loj09VariacaoProdutos
 * @property \common\models\Loj10FotoProduto[] $loj10FotoProdutos
 * @property \common\models\Loj12ProdutoPedido[] $loj12ProdutoPedidos
 */
class Loj08Produto extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ08_LOJA_ID', 'LOJ08_NOME', 'LOJ08_PRECO'], 'required'],
            [['LOJ08_LOJA_ID', 'LOJ08_QTD_LIKE', 'LOJ08_QTD_COMPART', 'LOJ08_STATUS'], 'integer'],
            [['LOJ08_PRECO'], 'number'],
            [['LOJ08_DT_INCLUSAO'], 'safe'],
            [['LOJ08_NOME'], 'string', 'max' => 50],
            [['LOJ08_DESCRICAO'], 'string', 'max' => 300],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'LOJ08_PRODUTO';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
//        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOJ08_ID' => 'Loj08  ID',
            'LOJ08_LOJA_ID' => 'Loj08  Loja  ID',
            'LOJ08_NOME' => 'Loj08  Nome',
            'LOJ08_DESCRICAO' => 'Loj08  Descricao',
            'LOJ08_PRECO' => 'Loj08  Preco',
            'LOJ08_QTD_LIKE' => 'Loj08  Qtd  Like',
            'LOJ08_QTD_COMPART' => 'Loj08  Qtd  Compart',
            'LOJ08_STATUS' => 'Loj08  Status',
            'LOJ08_DT_INCLUSAO' => 'Loj08  Dt  Inclusao',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ08LOJA()
    {
        return $this->hasOne(\common\models\Loj07Loja::className(), ['LOJ07_ID' => 'LOJ08_LOJA_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj09VariacaoProdutos()
    {
        return $this->hasMany(\common\models\Loj09VariacaoProduto::className(), ['LOJ09_PRODUTO_ID' => 'LOJ08_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj10FotoProdutos()
    {
        return $this->hasMany(\common\models\Loj10FotoProduto::className(), ['LOJ10_PRODUTO_ID' => 'LOJ08_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj12ProdutoPedidos()
    {
        return $this->hasMany(\common\models\Loj12ProdutoPedido::className(), ['LOJ12_PRODUTO_ID' => 'LOJ08_ID']);
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
     * @return \app\models\Loj08ProdutoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj08ProdutoQuery(get_called_class());
    }
}
