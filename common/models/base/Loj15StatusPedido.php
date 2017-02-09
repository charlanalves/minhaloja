<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "loj15_status_pedido".
 *
 * @property integer $LOJ15_STATUS_ID
 * @property integer $LOJ15_PEDIDO_ID
 * @property integer $LOJ15_STATUS
 * @property string $LOJ15_DT_INCLUSAO
 *
 * @property \common\models\Loj14Status $lOJ15STATUS
 * @property \common\models\Loj11Pedido $lOJ15PEDIDO
 */
class Loj15StatusPedido extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ15_STATUS_ID', 'LOJ15_PEDIDO_ID'], 'required'],
            [['LOJ15_STATUS_ID', 'LOJ15_PEDIDO_ID', 'LOJ15_STATUS'], 'integer'],
            [['LOJ15_DT_INCLUSAO'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loj15_status_pedido';
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
            'LOJ15_STATUS_ID' => 'Loj15  Status  ID',
            'LOJ15_PEDIDO_ID' => 'Loj15  Pedido  ID',
            'LOJ15_STATUS' => 'Loj15  Status',
            'LOJ15_DT_INCLUSAO' => 'Loj15  Dt  Inclusao',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ15STATUS()
    {
        return $this->hasOne(\common\models\Loj14Status::className(), ['LOJ14_ID' => 'LOJ15_STATUS_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ15PEDIDO()
    {
        return $this->hasOne(\common\models\Loj11Pedido::className(), ['LOJ11_ID' => 'LOJ15_PEDIDO_ID']);
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
     * @return \app\models\Loj15StatusPedidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj15StatusPedidoQuery(get_called_class());
    }
}
