<?php

    use backend\assets\AppMlAsset;    
    AppMlAsset::register($this);
    
    $dataJson = json_encode($data);
    
?>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        
        $('#divCheckout').html('Aguarde . . .');
            
        var r = $.ajax({
            url: 'index.php?r=pagamento/pagamento',
            type: 'POST',
            data: {'dados': JSON.parse('<?= $dataJson ?>')},
            dataType: "jsonp"
        });
        
        r.always(function(data) {
            $('#divCheckout').html(data.responseText);
        });
        
    });
</script>

<div id="divCheckout" style="max-width: 650px; height: auto; border: 0px silver solid; margin: auto; margin-top: 0px;"></div>

