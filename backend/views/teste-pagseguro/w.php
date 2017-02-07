<?php

    use backend\assets\AppMlAsset;
    AppMlAsset::register($this);
    
    $data = [
        
        // dados de configuracao
        'gateway' => 'pagseguro', // pagseguro
        'forma_pag' => 'CreditCard', // OnlineDebit, Boleto, 
        'hash_recebedor_primario' => 'e1ca1177d8b0d18f87976fb6f7697242ff0c54955fab982bf7b54e8eb7147bd6', // sessao
        'hash_recebedor_secundario' => '', // vendedor secundario key
        'valor_total' => '100.00',
        
        // dados do item
        'item' => [[
            'item_cod' => '0001',
            'item_desc' => 'Produto Teste', 
            'item_qtd' => '1',
            'item_vlr' => '100.00',
        ]],
        
        // dados do comprador
        'comprador_nome'=>'Eduardo Matias Pereira',
        'comprador_data_nascimento' => '26/08/1989',
        'comprador_email'=>'eduardomatias1989@sandbox.pagseguro.com.br',
        'comprador_cpf'=>'003.325.992-56',
        'comprador_tel_ddd' => '31', 
        'comprador_tel_numero' => '991064029',
        
        // endereco de entrega
        'endereco_logradouro' => 'Av. Brig. Faria Lima',
        'endereco_numero' => '1384',
        'endereco_bairro' => 'Jardim Paulistano',
        'endereco_cep' => '01452002',
        'endereco_cidade' => 'São Paulo',
        'endereco_uf' => 'SP',
        'endereco_pais' => 'BRA',
        'endereco_complemento' => 'apto. 114',
        
        // dados do cartao
        'cartao_token' => 'b89f0d18914446438a8b4276fe9cf0bd',
        'cartao_nome' => 'Eduardo M Pereira', // validar se é obrigatorio
        'cartao_num_parcela' => '1',
        'cartao_vlr_parcela' => '100'
    ];
    
    $dataJson = json_encode($data);
    
    
?>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        
        $('#divCheckout').html('Aguarde . . .');
            
        var r = $.ajax({
            url: 'index.php?r=pagamento/pagamento',
            type: 'POST',
            data: {'dados': JSON.parse('<?= $dataJson ?>')},
            dataType: "jsonp"
        });
        
        r.always(function(data) {
            $('#divCheckout').html(data.responseText);
        });
        
    });
</script>

<div id="divCheckout" style="max-width: 650px; height: 500px; border: 1px silver solid; margin: auto; margin-top: 35px; overflow: auto;"></div>

