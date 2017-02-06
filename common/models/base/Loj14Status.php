<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj14_status".
 *
 * @property integer $LOJ14_ID
 * @property string $LOJ14_DESCRICAO
 * @property integer $LOJ14_STATUS
 *
 * @property \common\models\Loj15StatusPedido[] $loj15StatusPedidos
 * @property \common\models\Loj11Pedido[] $lOJ15PEDIDOs
 */
class Loj14Status extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ14_DESCRICAO'], 'required'],
            [['LOJ14_STATUS'], 'integer'],
            [['LOJ14_DESCRICAO'], 'string', 'max' => 100],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj14_status';
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
            'LOJ14_ID' => 'Loj14  ID',
            'LOJ14_DESCRICAO' => 'Loj14  Descricao',
            'LOJ14_STATUS' => 'Loj14  Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoj15StatusPedidos()
    {
        return $this->hasMany(\common\models\Loj15StatusPedido::className(), ['LOJ15_STATUS_ID' => 'LOJ14_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ15PEDIDOs()
    {
        return $this->hasMany(\common\models\Loj11Pedido::className(), ['LOJ11_ID' => 'LOJ15_PEDIDO_ID'])->viaTable('loj15_status_pedido', ['LOJ15_STATUS_ID' => 'LOJ14_ID']);
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
     * @return \app\models\Loj14StatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj14StatusQuery(get_called_class());
    }
}
