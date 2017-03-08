<?php

namespace common\models;

use \common\models\base\Loj11Pedido as BaseLoj11Pedido;

/**
 * This is the model class for table "loj11_pedido".
 */
class Loj11Pedido extends BaseLoj11Pedido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['LOJ11_LOJA_ID', 'LOJ11_GATEWAY', 'LOJ11_VALOR'], 'required'],
            [['LOJ11_LOJA_ID', 'LOJ11_USUARIO_ID', 'LOJ11_NUM_PARCELA', 'LOJ11_STATUS'], 'integer'],
            [['LOJ11_VALOR','LOJ11_FRETE'], 'number'],
            [['LOJ11_DT_INCLUSAO'], 'safe'],
            [['LOJ11_FORMA_PAG', 'LOJ11_GATEWAY'], 'string', 'max'=>50],
//            [['lock'], 'default', 'value' => '0'],
//            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function getPedido($pedido)
    {
        $sql = "SELECT LOJ07_LOJA.LOJ07_NOME,LOJ07_LOJA.LOJ07_DESCRICAO,LOJ07_LOJA.LOJ07_LOGO,LOJ07_LOJA.LOJ07_TELEFONE,LOJ07_LOJA.LOJ07_EMAIL,LOJ07_LOJA.LOJ07_HASH_PAGSEGURO,
                LOJ11_PEDIDO.LOJ11_ID,LOJ11_PEDIDO.LOJ11_GATEWAY,LOJ11_PEDIDO.LOJ11_FORMA_PAG,LOJ11_PEDIDO.LOJ11_VALOR,LOJ11_PEDIDO.LOJ11_NUM_PARCELA ,LOJ11_FRETE, LOJ11_FRETE+LOJ11_VALOR AS VALOR_TOTAL
                FROM LOJ11_PEDIDO
                INNER JOIN LOJ07_LOJA ON(LOJ11_PEDIDO.LOJ11_LOJA_ID = LOJ07_LOJA.LOJ07_ID)
                WHERE LOJ11_PEDIDO.LOJ11_STATUS=1 AND LOJ11_PEDIDO.LOJ11_ID = :pedido";

        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $command->bindValue(':pedido', $pedido);
        return $command->query()->readAll();
    }
}
