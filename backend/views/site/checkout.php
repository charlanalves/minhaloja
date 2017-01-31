<div id="container" style="height: 100%;">
    <section data-reactroot="" class="Checkout is-desktop" role="dialog" aria-live="polite" aria-label="Secure Credit Card Form">          
        <span>
            <div class="Overlay">
                <div class="Overlay-Background"></div>
            </div>
        </span>
        <span>
            <div class="ModalContainer" style="width: 320px;">
                <div class="Modal-animationWrapper">
                    <span></span>
                    <main class="Modal" role="main" style="width: 320px;">
                        <div>
                            <header class="Header" role="banner">

                                <!-- <div class="Header-logo">
                                    <div class="Header-logoWrap">
                                       <div class="Header-logoBevel"></div>
                                       <div class="Header-logoBorder"></div>
                                       <img class="Header-logoImageCatchError" src="https://stripe.com/img/documentation/checkout/marketplace.png">
                                       <div class="Header-logoImage" alt="Logo" style="background-image: url(&quot;https://stripe.com/img/documentation/checkout/marketplace.png&quot;);"></div>
                                    </div>
                                 </div> -->
                                <h1 class="Header-companyName u-textTruncate">TOTAL A PAGAR</h1>
                                <h2 class="Header-purchaseDescription u-textTruncate">R$ 279.89</h2>

                                <div class="Header-account" style="position: relative;"></div>
                            </header>
                            <div class="PaymentMethodSelector-wrapper">
                                <div class="PaymentMethodSelector-edge"></div>
                            </div>
                        </div>


                        <div class="product-content product-wrap clearfix" style="margin:0;border:0;">
                            <div class="row" style="margin: 0px;">
                                <div class="col-md-5 col-sm-12 col-xs-12 col-xs-custom-50 col-no-padding" style="padding:0">
                                    <div class="product-image" style="min-height: auto; border:0; padding: 0px 10px; margin: 0px">
                                        <img src="img/demo/e-comm/3.png" alt="194x228" class="img-responsive"> 
                                        <!--<span class="tag2 hot">5%</span>-->
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-12 col-xs-custom-50 col-no-padding" style="padding:0">
                                    <div class="product-deatil" style="border:0; padding: 5px; margin: 0px">
                                        <h6 class="name"style="margin:0;margin-bottom: 5px;border:0;width: 100%;">
                                            Aviator Clássico (Ray-Ban) Óculos De Sol
                                        </h6>
                                        <div class="font-xs">Tam.: 65</div>
                                        <div class="font-xs">Cor: Preto</div>
                                        <div class="font-xs">Qtd: 1</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            section {
                                padding: 0!important;
                                padding-right: 15px!important;
                                padding-left: 15px!important;
                                margin: 4px 0px!important;
                            }
                            fieldset{
                                padding: 10px 10px!important;
                            }
                            fieldset legend{
                                padding-top: 0px!important;
                                margin: 0;
                            }
                            .form-padding-left{
                                /*padding-left: 5px!important*/
                                padding-left: 5px!important
                            }
                            .form-padding-right{
                                /*padding-right: 5px!important*/
                                padding-right: 5px!important
                            }
                            .page-footer{display: none}
                        </style>

                        <form action="" id="checkout-form" class="smart-form" novalidate="novalidate" style="background-color: #FFF">

                            <fieldset>
                                <legend>Meus dados</legend>

                                <div class="row">
                                    <section>
                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                            <input type="text" name="nome" placeholder="Nome completo">
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6 form-padding-right">
                                        <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                            <input type="email" name="email" placeholder="E-mail">
                                        </label>
                                    </section>
                                    <section class="col col-6 form-padding-left">
                                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                            <input type="tel" name="telefone" placeholder="Telefone" data-mask="(99) 99999-9999">
                                        </label>
                                    </section>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Endereço de entrega</legend>
                                
                                <div class="row">
                                    
                                    <section class="col col-4 form-padding-right">
                                        <label class="input">
                                            <input type="text" name="cep" placeholder="CEP" data-mask="99999-999">
                                        </label>
                                    </section>
                                    
                                    <section class="col col-8 form-padding-left">
                                        <label class="input">
                                            <input type="text" name="logradouro" placeholder="Logradouro">
                                        </label>
                                    </section>

                                </div>
                                
                                <div class="row">
                                    
                                    <section class="col col-5 form-padding-right">
                                        <label class="input">
                                            <input type="text" name="bairro" placeholder="Bairro">
                                        </label>
                                    </section>
                                    
                                    <section class="col col-5 form-padding-left form-padding-right">
                                        <label class="input">
                                            <input type="text" name="cidade" placeholder="Cidade">
                                        </label>
                                    </section>
                                    
                                    <section class="col col-2 form-padding-left">
                                        <label class="input">
                                            <input type="text" name="uf" placeholder="UF">
                                        </label>
                                    </section>
                                    
                                </div>

                                <div class="row">
                                    
                                    <section class="col col-3 form-padding-right">
                                        <label class="input">
                                            <input type="text" name="numero" placeholder="Nº">
                                        </label>
                                    </section>
                                    
                                    <section class="col col-9 form-padding-left">
                                        <label class="input">
                                            <input type="text" name="complemento" placeholder="Complemento">
                                        </label>
                                    </section>
                                    
                                </div>
                                    
                            </fieldset>

                            <fieldset>
                                <legend>Forma de pagamento</legend>
                                
                                <div class="row">
                                    <section>
                                        <div class="inline-group">
                                            <label class="radio">
                                                <input type="radio" name="tipo-pagamento" value="cartao-credito" checked="">
                                                <i></i>Cartão de Crédito
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="tipo-pagamento" value="boleto">
                                                <i></i>Boleto
                                            </label>
                                        </div>
                                    </section>
                                </div>

                                <div class="row">
                                    
                                    <section class="col col-9 form-padding-right">
                                        <label class="input">
                                            <input type="text" name="cartao-numero" placeholder="Número do cartão">
                                        </label>
                                    </section>
                                    
                                    <section class="col col-3 form-padding-left">
                                        <label class="input">
                                            <input type="text" name="cartao-bandeira" placeholder="Bandeira">
                                        </label>
                                    </section>
                                    
                                </div>

                                <div class="row">
                                    
                                    <label class="label col col-3 form-padding-right text-right">Vencimento:</label>
                                    
                                    <section class="col col-3 form-padding-right form-padding-left">
                                        <label class="select">
                                            <select name="cartao-mes">
                                                <option value="0" selected="" disabled="">Mês</option>
                                                <option value="1">Janeiro</option>
                                                <option value="1">Fevereiro</option>
                                                <option value="3">Março</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Maio</option>
                                                <option value="6">Junho</option>
                                                <option value="7">Julho</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Setembro</option>
                                                <option value="10">Outubro</option>
                                                <option value="11">Novembro</option>
                                                <option value="12">Dezembro</option>
                                            </select> <i></i> 
                                        </label>
                                    </section>
                                    
                                    <section class="col col-3 form-padding-right form-padding-left">
                                        <label class="input">
                                            <input type="text" name="cartao-ano" placeholder="Ano">
                                        </label>
                                    </section>
                                    
                                    <section class="col col-3 form-padding-left">
                                        <label class="input">
                                            <input type="text" name="cartao-cvv" placeholder="CVV">
                                        </label>
                                    </section>
                                    
                                </div>

                                <div class="row">
                                    
                                    <label class="label col col-3 form-padding-right text-right">Parcela(s):</label>
                                    
                                    <section class="col col-9 form-padding-left">
                                        <label class="select">
                                            <select name="cartao-parcela">
                                                <option value="1" selected="" disabled="">1 x R$ 279,89</option>
                                            </select>
                                        </label>
                                    </section>
                                    
                                </div>

                            </fieldset>

                            <footer>
                                <a href="#" type="submit" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart"></i>
                                    Comprar
                                </a>
                            </footer>
                        </form>
                    </main>
                </div>
            </div>
        </span>
    </section>
</div>