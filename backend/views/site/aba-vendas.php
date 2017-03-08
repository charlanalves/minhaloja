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