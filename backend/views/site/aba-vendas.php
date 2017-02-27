<div class="row bg-white">
	<div class="col-xs-12 col-xs-custom-50 col-no-padding col-sm-5 col-md-5 col-lg-8 text-center width-100">
						
                <a href="#" data-toggle="modal" data-target="#remoteModal" class="btn btn-primary btn-lg" id="btn-venda-rapida">
                        Venda Rápida
                </a>
                 
                <div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true">  
                    <div class="modal-dialog modal-venda-rapida">  
                        <div class="modal-content modal-content-venda-rapida">
                                <?= Yii::$app->controller->renderPartial('venda-rapida') ?>
                        </div>  
                    </div>
                </div>							
        </div>  
</div>

<script>
    
document.querySelectorAll('#btn-venda-rapida')[0].addEventListener('click', function(){
        document.querySelectorAll('#container-finalizar-venda')[0].style.display = 'block';
       
})
</script>


<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-table fa-fw "></i> 
				Table 
			<span>> 
				Data Tables
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5> Vendas último mês <span class="txt-color-blue">$47,171</span></h5>
				<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
					1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
				</div>
			</li>
			<li class="sparks-info">
				<h5> Aumento de: <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
				<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
					110,150,300,130,400,240,220,310,220,300, 270, 210
				</div>
			</li>
			<li class="sparks-info">
				<h5> Número de Vendas: <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
				<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
					110,150,300,130,400,240,220,310,220,300, 270, 210
				</div>
			</li>
		</ul>
	</div>
</div>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
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
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Listagem de vendas:</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">

						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Código</th>
                                                                            <th data-hide="phone">Nome Cliente:</th>
                                                                            <th data-hide="phone">Email:</th>
                                                                            <th data-hide="phone">Nome produto:</th>
                                                                            <!--<th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Qtd:</th>-->
                                                                            <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Forma Pgto:</th>									                                                                                                                                                  
                                                                            <th data-hide="phone">Valor Parcelado:</th>
                                                                            
                                                                            <th>Data</th>
                                                                            <th>Valor</th>
                                                                            <th>Status</th>
                                                                            <th>Ação</th>
								</tr>
							</thead>
							<tbody>
                                                          <?php foreach ($pedidos as $pedido): ?>                                                          
                                                            <tr>        
                                                                <td><?= $pedido['LOJ11_ID'] ?><input type="hidden" id="emailcliente" value="<?= $pedido['LOJ11_CLIENTE_EMAIL'] ?>"></td>
                                                                <td><?= $pedido['LOJ11_CLIENTE_NOME'] ?></td>
                                                                <td><?= $pedido['LOJ11_CLIENTE_EMAIL'] ?></td>
                                                                
                                                                <td><?= $pedido['LOJ12_NOME_PRODUTO'] ?></td>
                                                                <!--<td><// $pedido['LOJ12_QTD'] ?></td>-->
                                                                <td><?= $pedido['LOJ11_FORMA_PAG'] ?></td>
                                                                <?php if (!empty($pedido['VALOR_PARCELADO'])):?>
                                                                    <td><?= $pedido['VALOR_PARCELADO'] ?></td>
                                                                <?php endif;?>
                                                                

                                                                <td><?= $pedido['LOJ11_DT_INCLUSAO'] ?></td>
                                                                <td><?= $pedido['LOJ12_VLR_UNID'] ?></td>
                                                                <td><b><?= $pedido['LOJ11_STATUS'] ?></b></td>
                                                                <td>
                                                                    <a href="form-x-editable.html#" id="enviarCobranca" data-type="text" data-pk="1" data-original-title="ENVIAR COBRANÇA" class="btn btn-success btn-sm" data-placement="left">
                                                                        Enviar
                                                                    </a>
                                                                   
                                                                </td>
                                                            </tr>
                                                            
                                                          <?php endforeach; ?>
							</tbody>
						</table>

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

	
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 * 
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 */
	
	// PAGE RELATED SCRIPTS
	
	// pagefunction	


	// load related plugins
	

</script>
