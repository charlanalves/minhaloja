<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj09_variacao_produto".
 *
 * @property integer $LOJ09_ID
 * @property integer $LOJ09_PRODUTO_ID
 * @property string $LOJ09_DESCRICAO
 * @property integer $LOJ09_GRUPO
 *
 * @property \common\models\Loj08Produto $lOJ09PRODUTO
 * @property \common\models\Loj13ProdutoPedidoVariacao[] $loj13ProdutoPedidoVariacaos
 */
class Loj09VariacaoProduto extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ09_PRODUTO_ID', 'LOJ09_DESCRICAO', 'LOJ09_GRUPO'], 'required'],
            [['LOJ09_PRODUTO_ID', 'LOJ09_GRUPO'], 'integer'],
            [['LOJ09_DESCRICAO'], 'string', 'max' => 100],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'LOJ09_VARIACAO_PRODUTO';
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
            'LOJ09_ID' => 'Loj09  ID',
            'LOJ09_PRODUTO_ID' => 'Loj09  Produto  ID',
            'LOJ09_DESCRICAO' => 'Loj09  Descricao',
            'LOJ09_GRUPO' => 'Loj09  Grupo',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ09PRODUTO()
    {
        return $this->hasOne(\common\models\Loj08Produto::className(), ['LOJ08_ID' => 'LOJ09_PRODUTO_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj13ProdutoPedidoVariacaos()
    {
        return $this->hasMany(\common\models\Loj13ProdutoPedidoVariacao::className(), ['LOJ13_VARIACAO_ID' => 'LOJ09_ID']);
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
     * @return \app\models\Loj09VariacaoProdutoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj09VariacaoProdutoQuery(get_called_class());
    }
}
