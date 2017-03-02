<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "LOJ07_LOJA".
 *
 * @property integer $LOJ07_ID
 * @property integer $LOJ07_CLIENTE_ID
 * @property string $LOJ07_NOME
 * @property string $LOJ07_DESCRICAO
 * @property string $LOJ07_LOGO
 * @property string $LOJ07_TELEFONE
 * @property string $LOJ07_EMAIL
 * @property string $LOJ07_NICK_INSTAGRAM
 * @property string $LOJ07_HASH_PAGSEGURO
 * @property integer $LOJ07_CARTAO_MAX_PARC
 * @property integer $LOJ07_FLG_BOLETO
 * @property string $LOJ07_FRETE
 * @property integer $LOJ07_STATUS
 * @property string $LOJ07_DT_INCLUSAO
 *
 * @property \common\models\LOJ02CLIENTE $lOJ07CLIENTE
 * @property \common\models\LOJ08PRODUTO[] $lOJ08PRODUTOs
 */
class Loj07Loja extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOJ07_CLIENTE_ID', 'LOJ07_NOME', 'LOJ07_DESCRICAO', 'LOJ07_EMAIL', 'LOJ07_HASH_PAGSEGURO', 'LOJ07_NICK_INSTAGRAM'], 'required'],
            [['LOJ07_CLIENTE_ID', 'LOJ07_CARTAO_MAX_PARC', 'LOJ07_FLG_BOLETO', 'LOJ07_STATUS'], 'integer'],
            [['LOJ07_FRETE'], 'number'],
            [['LOJ07_DT_INCLUSAO'], 'safe'],
            [['LOJ07_NOME', 'LOJ07_LOGO', 'LOJ07_EMAIL', 'LOJ07_HASH_PAGSEGURO'], 'string', 'max' => 100],
            [['LOJ07_DESCRICAO'], 'string', 'max' => 300],
            [['LOJ07_TELEFONE'], 'string', 'max' => 15],
            [['LOJ07_NICK_INSTAGRAM'], 'string', 'max' => 50],
            [['LOJ07_CLIENTE_ID'], 'unique'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'LOJ07_LOJA';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOJ07_ID' => 'Loj07  ID',
            'LOJ07_CLIENTE_ID' => 'Loj07  Cliente  ID',
            'LOJ07_NOME' => 'Loj07  Nome',
            'LOJ07_DESCRICAO' => 'Loj07  Descricao',
            'LOJ07_LOGO' => 'Loj07  Logo',
            'LOJ07_TELEFONE' => '(XX) xxxxx-xxxx',
            'LOJ07_EMAIL' => 'Loj07  Email',
            'LOJ07_NICK_INSTAGRAM' => 'Loj07  Nick Instagram',
            'LOJ07_HASH_PAGSEGURO' => 'Loj07  Hash  Pagseguro',
            'LOJ07_CARTAO_MAX_PARC' => 'Se NULL não aceita cartão',
            'LOJ07_FLG_BOLETO' => 'Loj07  Flg  Boleto',
            'LOJ07_FRETE' => 'Loj07  Frete',
            'LOJ07_STATUS' => 'Loj07  Status',
            'LOJ07_DT_INCLUSAO' => 'Loj07  Dt  Inclusao',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ07CLIENTE()
    {
        return $this->hasOne(\common\models\LOJ02CLIENTE::className(), ['LOJ02_ID' => 'LOJ07_CLIENTE_ID']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOJ08PRODUTOs()
    {
        return $this->hasMany(\common\models\LOJ08PRODUTO::className(), ['LOJ08_LOJA_ID' => 'LOJ07_ID']);
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
//                'createdAtAttribute' => 'LOJ07_DT_INCLUSAO',
//                'updatedAtAttribute' => '',
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
     * @return \app\models\Loj07LojaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Loj07LojaQuery(get_called_class());
    }
}
