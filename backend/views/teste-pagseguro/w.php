<br />
<br />
<br />
<?php
    $data = [
        
        // dados de configuracao
        'gateway' => 'pagseguro', // pagseguro
        'forma_pag' => 'CreditCard', // OnlineDebit, Boleto, 
        'hash' => 'e1ca1177d8b0d18f87976fb6f7697242ff0c54955fab982bf7b54e8eb7147bd6', // sessao
        'hash-recebedor-secundario' => '', // vendedor secundario key
        'valor-total' => '100.00',
        
        // dados do produto
        'produto' => [[
            'produto-cod' => '0001',
            'produto-desc' => 'Produto Teste', 
            'produto-qtd' => '1',
            'produto-vlr' => '100.00',
        ]],
        
        // dados do comprador
        'comprador-nome'=>'Eduardo Matias Pereira',
        'comprador-data-nascimento' => '26/08/1989',
        'comprador-email'=>'eduardomatias1989@sandbox.pagseguro.com.br',
        'comprador-cpf'=>'003.325.992-56',
        'comprador-tel-ddd' => '31', 
        'comprador-tel-numero' => '991064029',
        
        // endereco de entrega
        'endereco-logradouro' => 'Av. Brig. Faria Lima',
        'endereco-numero' => '1384',
        'endereco-bairro' => 'Jardim Paulistano',
        'endereco-cep' => '01452002',
        'endereco-cidade' => 'São Paulo',
        'endereco-uf' => 'SP',
        'endereco-pais' => 'BRA',
        'endereco-complemento' => 'apto. 114',
        
        // dados do cartao
        'cartao-token' => 'b89f0d18914446438a8b4276fe9cf0bd',
        'cartao-nome' => 'Eduardo M Pereira', // validar se é obrigatorio
        'cartao-num-parcela' => '1',
        'cartao-vlr-parcela' => '100'
    ];
    
    echo common\components\widgets\pagamento\checkoutWidget::widget(['data' => $data]);
