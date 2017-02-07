<?php 
    $dadosJson = (!empty($dados)) ? json_encode($dados, true) : '{}';
?>

<script>
    var dados = JSON.parse('<?= $dadosJson?>');
    var gateway = dados['gateway'];
    var valorTotal = dados['valor_total'];
    var hashSecundario = dados['hash_recebedor_secundario'];
    
</script>

<?php

    /* @var $this yii\web\View */
//    use backend\assets\AppMlAsset;
//    AppMlAsset::register($this);
    $this->title = '';
    
    $token = \Yii::$app->pagamentoComponent->pagseguroCreateSession();
    
?>

<!-- PRODUCAO -->
<!--
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
-->

<!-- TESTE -->
<!--<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>-->


<!-- #CSS Links -->
<!-- Basic Styles -->
<!--<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">-->
<!--<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">-->

<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
<!--<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production-plugins.min.css">-->
<!--<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">-->
<!--<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">-->

<!-- DEV links : turn this on when you like to develop directly -->
<!--<link rel="stylesheet" type="text/css" media="screen" href="../Source_UNMINIFIED_CSS/smartadmin-production.css">-->
<!--<link rel="stylesheet" type="text/css" media="screen" href="../Source_UNMINIFIED_CSS/smartadmin-skins.css">-->

<!-- SmartAdmin RTL Support -->
<!--<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css">--> 

<!-- We recommend you use "your_style.css" to override SmartAdmin
     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
<!--<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css">-->
<!--<link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">-->

<!-- #FAVICONS -->
<!--<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">-->
<!--<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">-->

<!-- #GOOGLE FONT -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

<!-- #APP SCREEN / ICONS -->
<!-- Specifying a Webpage Icon for Web Clip 
         Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">

<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- Startup image for web apps -->
<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

<div id="content" style="padding: 10px">
    
    <div class="product-content product-wrap clearfix" style="margin:0;border:0;">
        <div class="row" style="margin: 0px;">
            <div class="col-md-5 col-sm-12 col-xs-12 col-xs-custom-50 col-no-padding" style="padding:0">
                <div class="product-image" style="min-height: auto; border:0; padding: 0px 10px; margin: 0px">
                    <img src="img/demo/e-comm/3.png" alt="194x228" class="img-responsive" /> 
                    <!--<span class="tag2 hot">5%</span>-->
                </div>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12 col-xs-custom-50 col-no-padding" style="padding:0">
                <div class="product-deatil" style="border:0; padding: 5px; margin: 0px">
                    <h1 class="name"style="margin:0;margin-bottom: 5px;border:0;width: 100%;">
                        Aviator Clássico (Ray-Ban) Óculos De Sol
                    </h1>
                    <div class="font-xs">
                        <p>
                            Tam.: 65 | Cor: Preto | Qtd: 1
                        </p>
                    </div>
                    <p class="price-container">
                        <span>R$ 100,00</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        section {
            padding: 0px 15px!important;
            margin: 5px 0px!important;
        }
        fieldset{
            margin: 0;
            padding: 15px 0px!important;
        }
        fieldset legend{
            padding-top: 0px!important;
            margin: 0;
        }
        .form-padding-left{
            /*padding-left: 5px!important
            padding-left: 2px!important*/
        }
        .form-padding-right{
            /*padding-right: 5px!important
            padding-right: 2px!important*/
        }
        .page-footer{display: none}
    </style>

    <form action="" id="checkout-form" class="smart-form" novalidate="novalidate" style="background-color: #FFF;padding: 10px">

        <input type="text" name="hash_recebedor_primario" hidden="true" value="">
        <input type="text" name="gateway" hidden="true" value="">
        <input type="text" name="valor_total" hidden="true" value="">
        <input type="text" name="cartao_token" hidden="true" value="">

        <fieldset>
            <legend>Meus dados</legend>

            <div class="row">
                <section class="col col-6 form-padding-right">
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                        <input type="text" name="comprador_nome" placeholder="Nome completo">
                    </label>
                </section>
                <section class="col col-6 form-padding-left">
                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                        <input type="text" name="comprador_cpf" placeholder="CPF" data-mask="999.999.999-99">
                    </label>
                </section>
            </div>

            <div class="row">
                <section class="col col-6 form-padding-right">
                    <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                        <input type="email" name="comprador_email" placeholder="E-mail">
                    </label>
                </section>
                <section class="col col-6 form-padding-left">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="tel" name="comprador_tel" placeholder="Telefone" data-mask="(99) 99999-9999">
                    </label>
                </section>
            </div>
        </fieldset>

        <fieldset>
            <legend>Endereço de entrega</legend>

            <div class="row">

                <section class="col col-4 form-padding-right">
                    <label class="input">
                        <input type="text" name="endereco_cep" placeholder="CEP" data-mask="99999-999">
                    </label>
                </section>

                <section class="col col-8 form-padding-left">
                    <label class="input">
                        <input type="text" name="endereco_logradouro" placeholder="Logradouro">
                    </label>
                </section>

            </div>

            <div class="row">

                <section class="col col-5 form-padding-right">
                    <label class="input">
                        <input type="text" name="endereco_bairro" placeholder="Bairro">
                    </label>
                </section>

                <section class="col col-5 form-padding-left form-padding-right">
                    <label class="input">
                        <input type="text" name="endereco_cidade" placeholder="Cidade">
                    </label>
                </section>

                <section class="col col-2 form-padding-left">
                    <label class="input">
                        <input type="text" name="endereco_uf" placeholder="UF">
                    </label>
                </section>

            </div>

            <div class="row">

                <section class="col col-3 form-padding-right">
                    <label class="input">
                        <input type="text" name="endereco_numero" placeholder="Nº">
                    </label>
                </section>

                <section class="col col-9 form-padding-left">
                    <label class="input">
                        <input type="text" name="endereco_complemento" placeholder="Complemento">
                    </label>
                </section>

            </div>

        </fieldset>

        <fieldset>
            <legend>Forma de pagamento</legend>

            <div class="row">
                <section class="col col-12">
                    <div class="inline-group">
                        <label class="radio">
                            <input type="radio" name="forma_pag" value="CreditCard" checked="">
                            <i></i>Cartão de Crédito
                        </label>
                        <label class="radio">
                            <input type="radio" name="forma_pag" value="Boleto" disabled="">
                            <i></i>Boleto
                        </label>
                    </div>
                </section>
            </div>

            <div class="row">

                <section class="col col-9">
                    <label class="input"><i class="icon-prepend fa fa-credit-card"></i>
                        <input type="text" name="cartao_numero" placeholder="Número do cartão" onchange="ps.getConfigCartao()" maxlength="16">
                    </label>
                </section>

                <section class="col col-3 form-padding-left">
                    <label class="input"> <i class="icon-append fa fa-question-circle"></i>
                        <input type="text" name="cartao_cvv" placeholder="CVV">
                        <b class="tooltip tooltip-top-right">
                            <i class="fa fa-warning txt-color-teal"></i> 
                            Digite o código de segurança
                        </b>
                    </label>
                </section>

            </div>

            <div class="row">

                <section class="col col-4 form-padding-right form-padding-left">
                    <label class="select">
                        <select name="cartao_mes">
                            <option value="0" selected="" disabled="">Mês</option>
                            <option value="01">Janeiro</option>
                            <option value="01">Fevereiro</option>
                            <option value="03">Março</option>
                            <option value="04">Abril</option>
                            <option value="05">Maio</option>
                            <option value="06">Junho</option>
                            <option value="07">Julho</option>
                            <option value="08">Agosto</option>
                            <option value="09">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select> <i></i> 
                    </label>
                </section>

                <section class="col col-2 form-padding-right form-padding-left">
                    <label class="input">
                        <input type="text" name="cartao_ano" placeholder="Ano" >
                    </label>
                </section>

                <section class="col col-6 form-padding-left">
                    <label class="select">
                        <select name="cartao_parcela"></select>
                    </label>
                </section>

            </div>

        </fieldset>
    </form>

</div>
<div class="modal-footer">
<!--    <button type="button" class="btn btn-default">
        Cancel
    </button>-->
    <button type="button" class="btn btn-primary" id="btnComprar">
        <i class="fa fa-shopping-cart"></i>
        Comprar
    </button>
</div>




<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<!--<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->


<!-- #PLUGINS -->
<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
    }
</script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>-->

<!-- IMPORTANT: APP CONFIG -->
<!--<script src="js/app.config.js"></script>-->

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<!--<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>--> 

<!-- BOOTSTRAP JS -->
<!--<script src="js/bootstrap/bootstrap.min.js"></script>-->

<!-- CUSTOM NOTIFICATION -->
<!--<script src="js/notification/SmartNotification.min.js"></script>-->

<!-- JARVIS WIDGETS -->
<!--<script src="js/smartwidgets/jarvis.widget.min.js"></script>-->

<!-- EASY PIE CHARTS -->
<!--<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>-->

<!-- SPARKLINES -->
<!--<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>-->

<!-- JQUERY VALIDATE -->
<!--<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>-->

<!-- JQUERY MASKED INPUT -->
<!--<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>-->

<!-- JQUERY SELECT2 INPUT -->
<!--<script src="js/plugin/select2/select2.min.js"></script>-->

<!-- JQUERY UI + Bootstrap Slider -->
<!--<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>-->

<!-- browser msie issue fix -->
<!--<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>-->

<!-- FastClick: For mobile devices: you can disable this in app.js -->
<!--<script src="js/plugin/fastclick/fastclick.min.js"></script>-->

<!--[if IE 8]>
        <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
<![endif]-->

<!-- Demo purpose only -->
<!--<script src="js/demo.min.js"></script>-->

<!-- MAIN APP JS FILE -->
<!--<script src="js/app.min.js"></script>-->

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<!--<script src="js/speech/voicecommand.min.js"></script>-->

<!-- SmartChat UI : plugin -->
<!--<script src="js/smart-chat-ui/smart.chat.ui.min.js"></script>-->
<!--<script src="js/smart-chat-ui/smart.chat.manager.min.js"></script>-->

<!-- Your GOOGLE ANALYTICS CODE Below -->
<script type="text/javascript">

//            var _gaq = _gaq || [];
//            _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
//            _gaq.push(['_trackPageview']);
//
//            (function () {
//                var ga = document.createElement('script');
//                ga.type = 'text/javascript';
//                ga.async = true;
//                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
//                var s = document.getElementsByTagName('script')[0];
//                s.parentNode.insertBefore(ga, s);
//            })();

</script>

<script type="text/javascript">

    pageSetUp();

    document.addEventListener("DOMContentLoaded", function(event) {
        var pagefunction = function () {

            var errorClass = 'invalid';
            var errorElement = 'em';

            var $checkoutForm = $('#checkout-form').validate({
                errorClass: errorClass,
                errorElement: errorElement,
                highlight: function (element) {
                    $(element).parent().removeClass('state-success').addClass("state-error");
                    $(element).removeClass('valid');
                },
                unhighlight: function (element) {
                    $(element).parent().removeClass("state-error").addClass('state-success');
                    $(element).addClass('valid');
                },
                // Rules for form validation
                rules: {
                    nome: {
                        required: true
                    },
                    cpf: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    telefone: {
                        required: true
                    },
                    endereco_uf: {
                        required: true
                    },
                    endereco_cidade: {
                        required: true
                    },
                    endereco_cep: {
                        required: true
                    },
                    logradouro: {
                        required: true
                    },
                    cartao_numero: {
                        required: true,
                        creditcard: true
                    },
                    cartao_cvv: {
                        required: true,
                        digits: true
                    },
                    cartao_mes: {
                        required: true
                    },
                    cartao_ano: {
                        required: true,
                        digits: true
                    }
                },
                // Messages for form validation
                messages: {
                    name: {
                        required: 'Informe seu nome completo'
                    },
                    cpf: {
                        required: 'Informe seu CPF',
                        digits: 'Digite um CPF valido'
                    },
                    email: {
                        required: 'Informe seu email',
                        email: 'Informe um email VALIDO'
                    },
                    telefone: {
                        required: 'Informe um telefone'
                    },
                    endereco_uf: {
                        required: 'Informe o UF'
                    },
                    'endereco_cidade': {
                        required: 'Informe a cidade'
                    },
                    endereco_cep: {
                        required: 'Informe o CEP',
                        digits: 'Apenas números'
                    },
                    endereco_logradouro: {
                        required: 'Infome o endereço'
                    },
                    cartao_numero: {
                        required: 'Informe o número do cartão',
                        creditcard: 'Informe um número de cartão valido'
                    },
                    cartao_cvv: {
                        required: 'Informe o código de segurança do cartão',
                        digits: 'Apenas números'
                    },
                    cartao_mes: {
                        required: 'Selecione um mês'
                    },
                    cartao_ano: {
                        required: 'Informe o ano de vencimento do cartão',
                        digits: 'Apenas números'
                    }
                },
                // Do not change code below
                errorPlacement: function (error, element) {
                    error.insertAfter(element.parent());
                }
            });

        };

        // Load form valisation dependency 
        loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

    });

    var ps = {};
    var configCartao = {};
    var idSession = '<?= $token?>';
    var cartaoBandeira = '';
    var parcelaFixa = false;
    
        
        // set campos hidden
        $('form#checkout-form input[name=valor_total]').val(valorTotal);
        $('form#checkout-form input[name=gateway]').val(gateway);
        
        PagSeguroDirectPayment.setSessionId(idSession);
        
        // hash do cliente
        ps.getHash = function() {
            var hash_recebedor_primario = PagSeguroDirectPayment.getSenderHash();
            $('form#checkout-form input[name=hash_recebedor_primario]').val(hash_recebedor_primario);
            console.log('hash_recebedor_primario: ' + hash_recebedor_primario);
        }

        // get formas de pagamento
        ps.getFormaPagamento = function(){
            PagSeguroDirectPayment.getPaymentMethods({
                success: function(a){},
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
            cartao = $('form#checkout-form input[name=cartao_numero]').val();
            console.log(cartao);
            if(cartao.length >= 6){
                var bin = parseInt(cartao.substring(0,6));
                PagSeguroDirectPayment.getBrand({
                    cardBin: bin,
                    success: function(a){},
                    error: function(a){
                        console.log(a);
                    },
                    complete: function(a){
                        configCartao = a.brand;
                        cartaoBandeira = configCartao.name;
                        ps.getParcelamentoCartao();
                    }
                });
            }
        }
        if($('form#checkout-form input[name=cartao_numero]').val()){
            ps.getConfigCartao();
        }

        // get token do cartao
        ps.getTokenCartao = function(){
            param = {
                cardNumber: $("form#checkout-form input[name=cartao_numero]").val(),
                brand: cartaoBandeira,
                cvv: $("form#checkout-form input[name=cartao_cvv]").val(),
                expirationMonth: $("form#checkout-form input[name=cartao_mes]").val(),
                expirationYear: $("form#checkout-form input[name=cartao_ano]").val(),
                success: function(a){},
                error: function(a){
                    console.log(a);
                },
                complete: function(a){
                    configCartao.token = a.card.token;
                    $('form#checkout-form input[name=cartao_token]').val(configCartao.token);
                }
            };

            PagSeguroDirectPayment.createCardToken(param);

        }

        // get parcelamentos
        ps.getParcelamentoCartao = function(){
            if(!parcelaFixa){
                PagSeguroDirectPayment.getInstallments({
                    amount: valorTotal,
                    brand: cartaoBandeira,
                    maxInstallmentNoInterest: 4,
                    success: function(a){},
                    error: function(a){
                        console.log(a);
                    },
                    complete: function(a){
                        for(var i in a.installments[cartaoBandeira]){
                            $('form#checkout-form select[name=cartao_parcela]').append($('<option>', {
                                value: a.installments[cartaoBandeira][i].quantity + '-' + a.installments[cartaoBandeira][i].installmentAmount,
                                text: a.installments[cartaoBandeira][i].quantity + 'x de R$' + a.installments[cartaoBandeira][i].installmentAmount
                            }));
                        }
                    }
                });
            }
        }
        
        // preenche form com os parametros recebidos
        for(var i in dados){
            //console.log(i + ': ' + dados[i]);
            // retira telefone e parcelas
            if(i != 'comprador_tel_ddd' && i != 'comprador_tel_numero' && i != 'cartao_num_parcela' && i != 'cartao_vlr_parcela') {
                $('form#checkout-form input[name=\'' + i + '\']').val(dados[i]);            
                $('form#checkout-form input[name=\'' + i + '\']').prop("disabled", true);
            }
        };
        
        // telefone
        if(dados['comprador_tel_ddd'] && dados['comprador_tel_numero']){
            $('form#checkout-form input[name=comprador_tel]').val('(' + dados['comprador_tel_ddd'] + ') ' + dados['comprador_tel_numero']);
            $('form#checkout-form input[name=comprador_tel]').prop("disabled", true);
        }
        
        // parcela
        if(dados['cartao_num_parcela'] && dados['cartao_vlr_parcela'] && dados['forma_pag'] == 'CreditCard'){
            $('form#checkout-form select[name=cartao_parcela]').append($('<option>', {
                value: dados['cartao_num_parcela'] + '-' + dados['cartao_vlr_parcela'],
                text:  dados['cartao_num_parcela'] + 'x de R$' + dados['cartao_vlr_parcela']
            }));
            $('form#checkout-form select[name=cartao_parcela]').prop("disabled", true);
            parcelaFixa = true;
        }

    
</script>