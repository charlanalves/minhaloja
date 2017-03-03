<?php

use backend\assets\AppMlAsset;
AppMlAsset::register($this);

$dadosJson = json_encode($data);

?>

<style>
    form {
        background-color: #FFF;
        padding: 10px;
    }
</style>

<form action="" id="config-form" name="config-form" onsubmit="return false" class="smart-form" novalidate="novalidate">
    <div id="content" style="padding: 10px;">

        <h3 id="nome_loja">Configuração</h3>

        <fieldset>
            <legend>Dados da Loja</legend>
            <div class="row">
                <section class="col col-6 form-padding-right">
                    <label class="input"> <i class="icon-prepend fa fa-briefcase"></i>
                        <input type="text" name="LOJ07_NOME" placeholder="Nome da loja" required="">
                    </label>
                </section>
            </div>
            <div class="row">
                <section class="col col-6 form-padding-right">
                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="tel" name="LOJ07_TELEFONE" id="LOJ07_TELEFONE" placeholder="Telefone" data-mask="(99) 99999999?">
                    </label>
                </section>
            </div>
            <div class="row">
                <section class="col col-6 form-padding-right">
                    <label class="input"> <i class="icon-prepend fa fa-key"></i>
                        <input type="text" name="LOJ07_HASH_PAGSEGURO" placeholder="Token da conta PagSeguro">
                    </label>
                </section>
            </div>
            <div class="row">
                <section class="col col-6 form-padding-left">
                    <label class="textarea"> <i class="icon-prepend fa fa-comment"></i> 										
                        <textarea rows="5" name="LOJ07_DESCRICAO" placeholder="Descreva sua loja aqui..."></textarea> 
                    </label>
                </section>
            </div>
        </fieldset>

        <fieldset>
            <legend>Formas de pagamento</legend>
            <div class="row">
                <div class="col col-3">
                    <label class="checkbox">
                        <input type="checkbox" name="LOJ07_CARTAO_MAX_PARC" checked="checked" value="1">
                        <i></i>Cartão de crédito
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="LOJ07_FLG_BOLETO" checked="checked" value="1">
                        <i></i>Boleto
                    </label>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Frete</legend>
            <div class="row">
                <section class="col col-6 form-padding-left">
                    <label class="input"> <i class="icon-prepend fa fa-truck"></i>
                        <input type="tel" name="LOJ07_FRETE" placeholder="Valor do frete" data-affixes-stay="false" data-prefix="R$ " data-thousands="" data-decimal=".">
                    </label>
                </section>
            </div>
        </fieldset>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default">
            Cancelar
        </button>
        <button type="submit" class="btn btn-primary" id="btnSalvar">
            Salvar
        </button>
    </div>

</form>

<script type="text/javascript">

    var dados = JSON.parse('<?= $dadosJson ?>');
    var $configForm = {};

    document.addEventListener("DOMContentLoaded", function (event) {

        $('form#config-form input[name=LOJ07_FRETE]').maskMoney();

        pageSetUp();

        // bind
        $.each(dados, function (k, v) {
            if (k != 'LOJ07_FLG_BOLETO' && k != 'LOJ07_CARTAO_MAX_PARC') {
                $('form#config-form [name=' + k + ']').val(v);
            } else {
                if (v) {
                    $('form#config-form input[name=' + k + ']').attr("checked");
                } else {
                    $('form#config-form input[name=' + k + ']').removeAttr("checked");
                }
            }
        });

        $('form#config-form button#btnSalvar').on('click', function () {
            if ($configForm.form() === true) {
                sendFormData();
            }
        });

        sendFormData = function () {

            data = $('form#config-form').serializeArray();
            console.log(data);

            var r = $.ajax({
                url: 'index.php?r=loja-config/save',
                type: 'POST',
                data: {'dados': data},
                dataType: "jsonp"
            });

            r.always(function (data) {
                console.log(data.responseText);
                if (!data.responseText) {
                    $.smallBox({
                        title: "Edição de dados",
                        content: "<i class='fa fa-clock-o'></i> <i>Os dados foram salvos com sucesso...</i>",
                        color: "#659265",
                        iconSmall: "fa fa-check fa-2x fadeInRight animated",
                        timeout: 4000
                    });
                    
                } else {
                    $.smallBox({
                        title: "Edição de dados",
                        content: "<i class='fa fa-clock-o'></i> <i>Os dados NÃO foram salvos, tente novamente...<br/>" + data.responseText + "</i>",
                        color: "#C46A69",
                        iconSmall: "fa fa-times fa-2x fadeInRight animated",
                        timeout: 4000
                    });
                }
            });
        }


        var pagefunction = function () {

            var errorClass = 'invalid';
            var errorElement = 'em';

            $configForm = $('#config-form').validate({
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
                    LOJ07_NOME: {
                        required: true
                    },
                    LOJ07_FRETE: {
                        required: true
                    },
                    LOJ07_HASH_PAGSEGURO: {
                        required: true
                    },
                },
                // Messages for form validation
                messages: {
                    LOJ07_NOME: {
                        required: 'Informe o nome da loja'
                    },
                    LOJ07_FRETE: {
                        required: 'Informe uma opção de frete'
                    },
                    LOJ07_HASH_PAGSEGURO: {
                        required: 'Informe o token de sua conta PagSeguro'
                    },
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
</script>