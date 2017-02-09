<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj10_foto_produto".
 *
 * @property integer $LOJ10_ID
 * @property integer $LOJ10_PRODUTO_ID
 * @property string $LOJ10_URL
 * @property integer $LOJ10_STATUS
 * @property string $LOJ10_DT_INCLUSAO
 *
 * @property \common\models\Loj08Produto $lOJ10PRODUTO
 */
class Loj10FotoProduto extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ10_PRODUTO_ID', 'LOJ10_URL'], 'required'],
            [['LOJ10_PRODUTO_ID', 'LOJ10_STATUS'], 'integer'],
            [['LOJ10_DT_INCLUSAO'], 'safe'],
            [['LOJ10_URL'], 'string', 'max' => 100],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj10_foto_produto';
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
            'LOJ10_ID' => 'Loj10  ID',
            'LOJ10_PRODUTO_ID' => 'Loj10  Produto  ID',
            'LOJ10_URL' => 'Loj10  Url',
            'LOJ10_STATUS' => 'Loj10  Status',
            'LOJ10_DT_INCLUSAO' => 'Loj10  Dt  Inclusao',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ10PRODUTO()
    {
        return $this->hasOne(\common\models\Loj08Produto::className(), ['LOJ08_ID' => 'LOJ10_PRODUTO_ID']);
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
     * @return \app\models\Loj10FotoProdutoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj10FotoProdutoQuery(get_called_class());
    }
}
