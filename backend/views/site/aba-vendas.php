
<!-- Bread crumb is created dynamically -->

<!-- row -->
<div class="row bg-white">
	
	
	<!-- right side of the page with the sparkline graphs -->
	<!-- col -->
	<div class="col-xs-12 col-xs-custom-50 col-no-padding col-sm-5 col-md-5 col-lg-8 text-center width-100">
		

						
						<a href="#" data-toggle="modal" data-target="#remoteModal" class="btn btn-primary btn-lg">
							Venda Rápida
						</a>

						<!-- Dynamic Modal -->  
						<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true">  
						    <div class="modal-dialog">  
						        <div class="modal-content">
						        	<!-- content will be filled here from "ajax/modal-content/model-content-1.html" -->
									<?= Yii::$app->controller->renderPartial('form-checkout') ?>
						        </div>  
						    </div>
				
                </div>							
						</div>  
						<!-- /.modal --> 
		
		
	</div>
	<!-- end col -->
	
	
	
</div>
<!-- end row -->

<!--
	The ID "widget-grid" will start to initialize all widgets below 
	You do not need to use widgets if you dont want to. Simply remove 
	the <section></section> and you can use wells or panels instead 
