

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div data-widget-collapsed="true" class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-fullscreenbutton="true" data-widget-editbutton="false" data-widget-deletebutton="false">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-check"></i> </span>
					<h2>VENDA RÁPIDA </h2>

				</header>
                                

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<div class="row height-800">
							<form id="wizard-1" novalidate="novalidate">
								<div id="bootstrap-wizard-1" class="col-sm-12">
									<div id="form-bootstrapWizard" class="form-bootstrapWizard">
										<ul class="bootstrapWizard form-wizard">
											<li class="active" data-target="#step1">
												<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Venda</span> </a>
											</li>
											<li data-target="#step2">
												<a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Endereço</span> </a>
											</li>
										
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											<br>
											<h3 class="h3etapa"><strong>Etapa 1</strong> - Informações da venda</h3>

											<div class="row">

												<div class="col-sm-12">
													<div class="form-group">
                                                                                                        <span class="campo-obrigatorio">*Campo obrigatório</span>
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-product-hunt fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" placeholder="Nome do produto/serviço" type="text" name="nomeproduto" id="lname">
														</div>
													</div>

												</div>

											</div>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
                                                                                                                <span class="campo-obrigatorio">*Campo obrigatório</span>
														<div class="input-group">
                                                                                                                    <span class="input-group-addon"><i class="fa fa-usd fa-lg fa-fw"></i></span>
															<input class="form-control input-lg valor" placeholder="R$ Valor da venda" type="text" name="valorvenda" id="valorVenda">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group"> 
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-dropbox fa-lg fa-fw"></i></span>
															<input class="form-control input-lg valor" placeholder="R$ Valor do frete" type="text" name="valorfrete" id="valorFrete">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-envelope fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" placeholder="E-mail do cliente" type="text" name="email" id="email">

														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab2">
											<br>
											<h3 class="h3etapa"><strong>Etapa 2</strong> - Endereço do Cliente</h3>

											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-envelope-o fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" data-mask="99999-999" placeholder="99999-999" type="text" name="cep" id="cep">
														</div>
													</div>
												</div>
                                                                                        </div>
											<div class="row">                                                                                        
												<div class="col-sm-12">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-product-hunt fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" placeholder="Logradouro" type="text" name="logradouro" id="logradouro">
														</div>
													</div>
												</div>
                                                                                        </div>
											<div class="row">                                                                                        
												<div class="col-sm-12">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-product-hunt fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" placeholder="Número" type="textnumero" name="numero" id="numero">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-product-hunt fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" placeholder="Complemento" type="text" name="complemento" id="complemento">															
														</div>
													</div>
												</div>
                                                                                        </div>
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="input-group">
                                                                                                                    <span class="input-group-addon"><i class="fa fa-product-hunt fa-lg fa-fw"></i></span>
                                                                                                                    <input class="form-control input-lg" placeholder="Bairro" type="text" name="bairro" id="bairro">																														
														</div>
													</div>
												</div>
                                                                                        </div>
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="input-group">
                                                                                                                    <span class="input-group-addon"><i class="fa fa-product-hunt fa-lg fa-fw"></i></span>
                                                                                                                    <input class="form-control input-lg" placeholder="Cidade" type="text" name="cidade" id="cidade">																														
														</div>
													</div>
												</div>
                                                                                        </div>
											<div class="row">
                                                                                            <div class="col-sm-12">
													<div class="form-group">
														<div class="input-group">
                                                                                                                    <span class="input-group-addon"><i class="fa fa-product-hunt fa-lg fa-fw"></i></span>
                                                                                                                    <input class="form-control input-lg" placeholder="Estado" type="text" name="estado" id="estado">																														
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div id="container-finalizar-venda-web" class="form-actions simple-hide" >
                                                                                    <div class="row">
                                                                                        <div class="col-sm-12 finalizar-venda">
                                                                                            <span>
                                                                                                <a id="finalizarVenda" href="javascript:void(0);" class="btn btn-primary btn-lg">Finalizar Venda </a>
                                                                                            </span>													
                                                                                        </div>
                                                                                    
                                                                                        <div class="col-sm-12">
                                                                                                <ul class="pager wizard no-margin">

                                                                                                        <li class="previous disabled">
                                                                                                                <a href="javascript:void(0);" class="btn btn-lg btn-default">Anterior </a>
                                                                                                        </li>
                                                                                                        <li class="next">
                                                                                                                <a href="javascript:void(0);" class="btn btn-lg txt-color-darken"> Próximo </a>
                                                                                                        </li>
                                                                                                </ul>
                                                                                        </div>
                                                                                    </div>
										</div>

									</div>
								</div>
							</form>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
                        
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->

		
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	

	// PAGE RELATED SCRIPTS

	// pagefunction

	var pagefunction = function() {

		// load bootstrap wizard
		
		loadScript("js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js", runBootstrapWizard);

		//Bootstrap Wizard Validations
                $.validator.addMethod("cep", function(value, element) { return this.optional(element) || /^[0-9]{5}-[0-9]{3}$/.test(value); }, "Por favor, digite um CEP válido");
		function runBootstrapWizard() {

			var $validator = $("#wizard-1").validate({
                              
				rules : {				
					nomeproduto : {
						required : true
					},	
                                        valorvenda : {
						required : true
                                               
					},
                                        email: {
                                            email: true,
                                        },
					country : {
						required : true
					},
					city : {
						required : true
					},
					cep : {
						cep:true,
					},
					wphone : {
						required : true,
						minlength : 10
					},
					hphone : {
						required : true,
						minlength : 10
					}
				},

				messages : {
					nomeproduto : "Gentileza informar o nome do produto ou serviço",
					valorvenda: "Gentileza informar o valor da venda",
					email : {
						required : "Informe o e-mail do seu cliente",
						email : "o e-mail deve ser nesse formato email@dominio.com"
					}
				},

				highlight : function(element) {
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				unhighlight : function(element) {
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				},
				errorElement : 'span',
				errorClass : 'help-block',
				errorPlacement : function(error, element) {
					if (element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					} else {
						error.insertAfter(element);
					}
				}
			});

			$('#bootstrap-wizard-1').bootstrapWizard({

				'tabClass' : 'form-wizard',
				'onNext' : function(tab, navigation, index) {
					var $valid = $("#wizard-1").valid();
					if (!$valid) {
						$validator.focusInvalid();
						return false;
					} else {
						$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass('complete');
						$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step').html('<i class="fa fa-check"></i>');
					}
				},
			});

		};

		// load fuelux wizard
		
		loadScript("js/plugin/fuelux/wizard/wizard.min.js", fueluxWizard);
		
		function fueluxWizard() {

			var wizard = $('.wizard').wizard();

			wizard.on('finished', function(e, data) {
				//$("#fuelux-wizard").submit();
				//console.log("submitted!");
				$.smallBox({
					title : "Congratulations! Your form was submitted",
					content : "<i class='fa fa-clock-o'></i><i>1 seconds ago...</i>",
					color : "#5F895F",
					iconSmall : "fa fa-check bounce animated",
					timeout : 4000
				});

			});

		};

	};

</script>
