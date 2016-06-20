<?php 
use yii\helpers\Url;
use app\models\Yao;
$this->registerCss(".ui-autocomplete {max-height: 300px;overflow-y: auto;overflow-x: hidden;}");
$this->registerJsFile('/js/tab.js', ['depends'=>yii\jui\JuiAsset::className()]);
$this->registerJs("
    
    var autodata = ". Yao::autocomplete() .";
$('body').on('click', function(){    
    $('.ui-autocomplete-yao').autocomplete({
        delay:1,
        minLength: 0,
        source: autodata,
        select: function(event, ui){
            $(this).val(ui.item.name);
            $(this).trigger('input');
            return false;
        },
    }).on('click', function(){
        $(this).trigger('keydown');
    }).each(function(){
        $(this).autocomplete( 'instance' )._renderItem = function( ul, item ) {
          return $( '<li>' )
            .append( '<a>' + item.name + '</a>' )
            .appendTo( ul );
        };
    });
});
    ");