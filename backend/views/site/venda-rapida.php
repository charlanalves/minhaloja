

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
															<span class="input-group-addon"><i class="fa fa-envelope fa-lg fa-fw"></i></span>
															<input class="form-control input-lg" placeholder="E-mail do cliente" type="email" name="email" id="email">

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
															<input class="form-control input-lg valor" placeholder="R$ Valor da venda" type="text" name="valorvenda" id="valorVenda" >
														</div>
													</div>
												</div>
											</div>
                                                                                        <div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="input-group">
                                                                                                                    <span class="input-group-addon"><i class="fa fa-usd fa-lg fa-fw"></i></span>
                                                                                                                    <select class="form-control input-lg" name="numeroparcelas" id="numeroParcelas" >
                                                                                                                        <option value=""></option>
                                                                                                                    </select>
														</div>
													</div>
												</div>
											</div>

											<div class="row">

												<div class="col-sm-12">
													<div class="form-group">
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
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-dropbox fa-lg fa-fw"></i></span>
															<input class="form-control input-lg valor" placeholder="R$ Valor do frete" type="number" name="valorfrete" id="valorFrete">
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
                                                                                    <span id="campos-ocultos" class="simple-hide">
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
                                                                                </span>
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
            
            	
		/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
		*/	

		/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};

			$('#dt_basic').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"oLanguage": {
					"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
				},	
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});

		/* END BASIC */
		
		/* COLUMN FILTER  */
	    var otable = $('#datatable_fixed_column').DataTable({
	    	//"bFilter": false,
	    	//"bInfo": false,
	    	//"bLengthChange": false
	    	//"bAutoWidth": false,
	    	//"bPaginate": false,
	    	//"bStateSave": true // saves sort state using localStorage
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"oLanguage": {
				"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
			},		
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_fixed_column) {
					responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_fixed_column.respond();
			}		
		
	    });
	    
	    // custom toolbar
	    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
	    	   
	    // Apply the filter
	    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
	    	
	        otable
	            .column( $(this).parent().index()+':visible' )
	            .search( this.value )
	            .draw();
	            
	    } );
	    /* END COLUMN FILTER */   
    
		/* COLUMN SHOW - HIDE */
		$('#datatable_col_reorder').dataTable({
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
			"oLanguage": {
				"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
			},
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_col_reorder) {
					responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_col_reorder.respond();
			}			
		});
		
		/* END COLUMN SHOW - HIDE */

		/* TABLETOOLS */
		$('#datatable_tabletools').dataTable({
			
			// Tabletools options: 
			//   https://datatables.net/extensions/tabletools/button_options
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
			"oLanguage": {
				"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
			},
	        "oTableTools": {
	        	 "aButtons": [
	             "copy",
	             "csv",
	             "xls",
	                {
	                    "sExtends": "pdf",
	                    "sTitle": "SmartAdmin_PDF",
	                    "sPdfMessage": "SmartAdmin PDF Export",
	                    "sPdfSize": "letter"
	                },
	             	{
                    	"sExtends": "print",
                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                	}
	             ],
	            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
	        },
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_tabletools) {
					responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_tabletools.respond();
			}
		});
		
		/* END TABLETOOLS */


		// load bootstrap wizard
		
		loadScript("js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js", runBootstrapWizard);

		//Bootstrap Wizard Validations
                $.validator.addMethod("cep", function(value, element) { return this.optional(element) || /^[0-9]{5}-[0-9]{3}$/.test(value); }, "Por favor, digite um CEP válido");
		function runBootstrapWizard() {

			var $validator = $("#wizard-1").validate({
                              
				rules : {				
					
                                        email: {
                                            required : true,
                                            email: true
                                        },
                                        valorvenda : {
						required : true
                                               
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
						required : "Gentileza, Informar o e-mail do seu cliente",
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
                
    $('body').on('click','#finalizarVenda',function(){
           var validou = $('#wizard-1').valid();    
           if (validou) {
               alert('validou');
               var formData = $('#wizard-1').serializeArray(),
                   url = './index/pedido/create';
               
                $.post(url, formData, function(data) {
                    if(typeof data.error == 'undefined') {

                    }

                }).fail(function(){ 
                      
                });
           }
       });   
 $("#main").on('click', '#numeroParcelas', function(){
	total = $('#valorVenda').val();
	genParcelas(total);
});         
    $("#main").on('keyup', '#cep', function(){

         var val = $(this).val().trim();
             val = val.replace(/\X/g, '');
             val = val.replace(/\-/g,'');


            if (val.length == 8){
                var url='http://viacep.com.br/ws/'+ val +'/json/';
                 $.get(url, function(data) {
                        setBorder(['#tab2 input:not("#cep, #complemento")'], '#ccc')
                        $('#campos-ocultos').removeClass('simple-hide');
                        if(typeof data.message == 'undefined') { 
                            
                            data.cidade = data.localidade;
                            data.estado = data.uf;
                            
                            setValues('logradouro', data); 
                            setValues('bairro', data); 
                            setValues('cidade', data); 
                            setValues('estado', data);  

                            setBorder(['#numero']);     
                        }


                }).fail(function(){ 
                        $('#campos-ocultos').removeClass('simple-hide');    
                            setBorder(['#tab2 input:not("#cep, #complemento")']); 
                            cleanFields(['#tab2 input:not("#cep, #complemento")']); 
                            enabledFields(['#tab2 input:not("#cep, #complemento")'], false);         
                });
            } else {
                $('#campos-ocultos').addClass('simple-hide');
            }
        
    });    

    function setValues(elementName, data){
     if (data[elementName] != ''){
         $('#'+elementName).val(data[elementName]);
         $('#'+elementName).prop('readonly', true);
      } else {
            $('#'+elementName).css('border-color', 'red');
      }
    }

    function setBorder(selElements, color){
        color = (color || 'red');
        for (var i in selElements){
            $(selElements[i]).rules("add", {
                required: true,
                messages: {
                    required: "O campo acima é obrigatório",
                }
              });
                $(selElements[i]).css('border-color', color);
        }
    }

    function removeBorder(selElements){	
        for (var i in selElements){
            $(selElements[i]).rules("remove", "required");
            $(selElements[i]).css('border-color', '#ccc');
        }
    }

    function cleanFields(selElements){	
        for (var i in selElements){
            $(selElements[i]).val('');
        }

    }

    function enabledFields(selElements, disabled){	
        for (var i in selElements){
            $(selElements[i]).prop('readonly', disabled);
        }

    }
    
function toFixed(num, fixed) {
    var re = new RegExp('^-?\\d+(?:\.\\d{0,' + (fixed || -1) + '})?');
    return num.toString().match(re)[0];
}
function genParcelas(total, nparcelas){
    total = total.replace(/[^0-9]/g,'');
    options = $("#numeroParcelas");

    nparcelas = (nparcelas || 10);
	
    for(var np=1; np <= nparcelas; np++) {
        totalparcela = total / np;
        totalparcela = totalparcela.toFixed(2);
	    textoParcela = np + ' X de R$ ' + totalparcela;
        options.append($("<option />").val(np).text(textoParcela));
	}
}

	};
        
        
 


</script>
