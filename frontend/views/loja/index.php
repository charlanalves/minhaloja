
<style>
    ul.card-action-buttons {
        margin: -25px 10px 0 0;
    }
    ul.card-action-buttons {
        width: 100%;
        padding: 0;
        list-style-type: none;
    }
    ul.card-action-buttons li {
        list-style-type: none;
        width: auto;
        float: left;
        margin: 0 2px;
        text-align: center;
    }
    .blog-card ul.card-action-buttons li {
        display: inline-block;
        padding-left: 5px;
    }
    .z-depth-1-half, .btn:hover, .btn-large:hover, .btn-floating:hover {
        box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18),0 4px 15px 0 rgba(0,0,0,0.15);
    }
    .green.accent-4 {
        background-color: #00C853 !important;
    }
    .waves-effect {
        position: relative;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
        vertical-align: middle;
        z-index: 1;
        will-change: opacity, transform;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
    }
    .btn-floating {
        display: inline-block;
        color: #fff;
        position: relative;
        overflow: hidden;
        z-index: 1;
        width: 37px;
        height: 37px;
        line-height: 37px;
        padding: 0;
        background-color: #ff4081;
        border-radius: 50%;
        transition: .3s;
        cursor: pointer;
        vertical-align: middle;
    }
    .btn-floating:active{opacity: 0.3}
    .green {
        background-color: #4CAF50 !important;
    }
    .btn-floating i {
        width: inherit;
        display: inline-block;
        text-align: center;
        color: #fff;
        font-size: 1.6rem;
        line-height: 37px;
    }
    .btn i, .btn-large i, .btn-floating i, .btn-large i, .btn-flat i {
        font-size: 1.3rem;
        line-height: inherit;
    }
    .smart-form .col {
        padding-right: 10px!important;
        padding-left: 10px!important;
    }

</style>

<script>
    var form = [];
</script>

<?php
foreach ($data['PRODUTOS'] as $k => $v) {
    ?>
    <div class="row" style="max-width: 600px">

        <div class="col-sm-12 col-md-6 col-lg-6 col-no-padding">
            <!-- product -->
            <div class="product-content product-wrap clearfix" style="margin-top:0px!important;margin-bottom:10px!important;">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12  col-no-padding">
                        <div class="product-image" style="border-bottom: 2px solid silver">
                            <img src="<?= (isset($v['IMAGENS'][0]['LOJ10_URL'])) ? $v['IMAGENS'][0]['LOJ10_URL'] : "img/sem_imagem.jpg" ?>" alt="194x228" class="img-responsive"> 
    <!--                        <span class="tag2 hot">
                                DESCONTO
                            </span> -->
                        </div>
                        <ul class="card-action-buttons">
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="fa fa-heart"></i></a>
                                <br/><label>321</label>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light green" href="whatsapp://send?text=Teste"><i class="fa fa-share-alt"></i></a>
                                <br/><label></label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12 col-xs-custom-50" style="padding: 0 25px;">
                        <div class="product-deatil no-padding">
                            <h5 class="name">
                                <a href="#">
                                    <?= $v['LOJ08_NOME'] ?><span><?= $v['LOJ08_DESCRICAO'] ?></span>
                                </a>
                            </h5>
                            <p class="price-container">
                                <span>R$ <?= $v['LOJ08_PRECO'] ?></span>
                            </p>
                            <span class="tag1"></span> 
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form action="" id="form-<?= $v['LOJ08_ID'] ?>" onsubmit="return false" class="smart-form" novalidate="novalidate">

                                    <input type="hidden" name="JSON_DATA" value="" />

                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="select" id="qtd-<?= $v['LOJ08_ID'] ?>">
                                                QTD: 
                                                <select name="LOJ12_QTD">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                </select>
                                            </label>
                                        </section>
                                        <section class="col col-8">
                                            <label class="select" id="variacao-<?= $v['LOJ08_ID'] ?>"></label>
                                        </section>
                                    </div>

                                    <div class="product-info smart-form col-no-padding no-padding padding-bottom-10">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12"> 
                                                <button type="submit" class="btn btn-primary" id="btnComprar" onclick="btnPedido(<?= $v['LOJ08_ID'] ?>)" style="float: right; margin-right: 10px">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Comprar
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end product -->
        </div>	
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            $('#form-<?= $v['LOJ08_ID'] ?> input[name=JSON_DATA]').val('<?= json_encode($v) ?>');
        });
    </script>

    <?php
    // monta variações
    if (($variacoes = $v['VARIACAO'])) {
        foreach ($variacoes as $key => $value) {
            $label = $key;
            $options = [];
            foreach ($value as $var => $text) {
                $options[] = ['val' => $var, 'text' => $text];
            }
        }
        ?>

        <script>

            document.addEventListener("DOMContentLoaded", function (event) {

                // opcoes de variacao
                var arr_<?= $v['LOJ08_ID'] ?> = JSON.parse('<?= json_encode($options) ?>');

                // cria select a adiciona as opcoes
                var combo = $("<select></select>").attr("name", 'LOJ12_ID_VARIACAO').attr("required", true);
                combo.append($("<option>").attr('value', '').text('Selecione...'));
                $(arr_<?= $v['LOJ08_ID'] ?>).each(function () {
                    combo.append($("<option>").attr('value', this.val).text(this.text));
                });

                // coloca select na label
                $('label#variacao-<?= $v['LOJ08_ID'] ?>').append('<?= $label ?>:');
                $('label#variacao-<?= $v['LOJ08_ID'] ?>').append(combo);

                form[<?= $v['LOJ08_ID'] ?>] = {};

                var pagefunction = function () {

                    var errorClass = 'invalid';
                    var errorElement = 'em';

                    form[<?= $v['LOJ08_ID'] ?>] = $('#form-<?= $v['LOJ08_ID'] ?>').validate({
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
                            LOJ12_QTD: {
                                required: true
                            },
                            LOJ12_ID_VARIACAO: {
                                required: true
                            }
                        },
                        // Messages for form validation
                        messages: {
                            LOJ12_QTD: {
                                required: 'Selecione a quantidade desejada'
                            },
                            LOJ12_ID_VARIACAO: {
                                required: 'Selecione uma opção'
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
        </script>


        <?php
    }
}
//var_dump($data);
?>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        pageSetUp();
    });

    function btnPedido(a) {
        if (form[a].form() === true) {
            sendFormData(a);
        }
    }

    sendFormData = function (a) {

        data = $('form#form-' + a).serializeArray();
        console.log(data);
        return false;

        var r = $.ajax({
            url: 'index.php?r=loja/save',
            type: 'POST',
            data: {'dados': data},
            dataType: "jsonp"
        });

        r.always(function (data) {
            console.log(data.responseText);
            if (!data.responseText) {
                // move para a pagina de checkout
            } else {
                $.smallBox({
                    title: "Opss",
                    content: "<i class='fa fa-clock-o'></i> <i>Verifique todos os campos e tente novamente...</i>",
                    color: "#C46A69",
                    iconSmall: "fa fa-times fa-2x fadeInRight animated",
                    timeout: 4000
                });
            }
        });
    }
</script>
