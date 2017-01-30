<?php

    /* @var $this yii\web\View */
    use backend\assets\AppMlAsset;
    AppMlAsset::register($this);
    $this->title = '';
    
    $token = \Yii::$app->pagamentoComponent->pagseguroCreateSession();
?>

<!-- PRODUCAO -->
<!--
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
-->

<!-- TESTE -->
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

<script>
    
    var ps = {};
    var configCartao = {};
    
    document.addEventListener("DOMContentLoaded", function(event) {
        
        PagSeguroDirectPayment.setSessionId('<?= $token?>');
        console.log(PagSeguroDirectPayment);
        
        // hash do cliente
        ps.getHash = function() {
            var hash = PagSeguroDirectPayment.getSenderHash();
            $('#hash').text(hash);
            console.log(hash);
        }
        
        // get formas de pagamento
        ps.getFormaPagamento = function(){
            PagSeguroDirectPayment.getPaymentMethods({
                success: function(a){
                    console.log(a);
                },
                error: function(a){
                    console.log(a);
                },
                complete: function(a){
                    console.log(a);
                }
            });
        }
        
        // get sobre o cartao
        ps.getConfigCartao = function(){
            var bin = parseInt($("input#cartao").val().substring(0,6));
            PagSeguroDirectPayment.getBrand({
                cardBin: bin,
                success: function(a){
                    console.log(a);
                },
                error: function(a){
                    console.log(a);
                },
                complete: function(a){
                    configCartao = a.brand;
                    $('#bandeira').val(configCartao.name);
                }
            });
        }
        
        // get token do cartao
        ps.getTokenCartao = function(){
            param = {
                cardNumber: $("input#cartao").val(),
                brand: $("input#bandeira").val(),
                cvv: $("input#cvv").val(),
                expirationMonth: $("input#validadeMes").val(),
                expirationYear: $("input#validadeAno").val(),
                success: function(a){
                    console.log(a);
                },
                error: function(a){
                    console.log(a);
                },
                complete: function(a){
                    console.log(a);
                    configCartao.token = a.card.token;
                    $('#token-cartao').text(configCartao.token);
                }
            };
            
            PagSeguroDirectPayment.createCardToken(param);
            
        }
        
        // get parcelamentos
        ps.getParcelamentoCartao = function(){
            PagSeguroDirectPayment.getInstallments({
                amount: $("input#valorPgto").val(),
                brand: $("input#bandeira").val(),
                maxInstallmentNoInterest: 4,
                success: function(a){
                    console.log(a);
                },
                error: function(a){
                    console.log(a);
                },
                complete: function(a){
                    $('#parcelamento').val(a);
                }
            });
        }
        
    });

</script>

<div class="site-index">
    
    <div class="jumbotron"></div>
    
    <div class="body-content">
        
        Necessário validar:<br/>
        - bandeira aceita<br/>
        - cartao vencido<br/>
        - num de caracteres do numero do cartao e CVV

        <br/><br/>

        <button onclick="ps.getHash()">Mostra o HASH:</button> <u id="hash"></u>

        <br/><br/>

        Valor: <input type="text" id="valorPgto" value="100.00" />  

        <br/><br/>

        Numero do cartão: <input type="text" id="cartao" value="5268630475919395" />  
        <button onclick="ps.getConfigCartao()"> Exibir bandeira do cartão </button> <br/><br/>
        Bandeira: <input type="text" id="bandeira" disabled="true" size="15"/>

        <br/><br/>

        CVV: <input type="text" id="cvv" value="560" size="4" />

        <br/><br/>
        
        Validade: <input type="text" id="validadeMes" value="03" size="2" /> / <input type="text" id="validadeAno" value="2024" size="3" />

        <br/><br/>

        <button onclick="ps.getTokenCartao()">GERAR TOKEN DO CARTÃO</button> <u id="token-cartao"></u>

        <br/><br/>

        <button onclick="ps.getParcelamentoCartao()">PARCELAMENTO</button> <u id="parcelamento"></u>
        
    </div>
    
</div>
