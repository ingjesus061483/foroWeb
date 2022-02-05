$(document).on('ready',parametrizacion_js);
function parametrizacion_js(){
    //alert($("#ser").width());
    //$('.fancybox').fancybox();
    //alert();
    $("#mensaje_de_proceso #Error").delay(3000).fadeOut('slow');
    $("#mensaje_de_proceso #Exito").delay(3000).fadeOut('slow');
    $(".p_msn_ajax").height(50);
    $(".p_msn_ajax_error").hide();
    $(".p_msn_ajax_exito").hide();
    //$(".p_msn_ajax_exito").show().delay(3000).fadeOut('slow');
    //$(".p_msn_ajax_error").show().delay(3000).fadeOut('slow');
    
    $("#tabs2").on('click','#guardar_tec', guardar_tec);
    $("#tabs2").on('click','#guardar_dis', guardar_dis);
    //$("#tabs2").on('click','#guardar_fotos', guardar_fot);
    $("#tabs2").on('click','#guardar_tec_liq', guardar_tec_liq);
    $("#tabs2").on('click','#guardar_tec_rep', guardar_tec_rep);
   
   function guardar_tec_rep(){
        //alert($(".form_tec_rep").serialize());
        
         var dato=$(".form_tec_rep").serialize();
        
        $.ajax({
         url:"dinamic/proyecto_consulta_dinamic_2.php",
         type: 'POST',
         data: dato,
         success: function (data, textStatus, jqXHR) {
            $(".p_msn_ajax_exito").show().delay(3000).fadeOut("slow");
                
              
         },
         error: function (a,b,c){
             $(".p_msn_ajax_error").show().delay(4000).fadeOut("slow");
             
            }
        });
        return false
        
    }
   
   function guardar_tec_liq(){
        //alert($(".form_tec_liq").serialize());
        
         var dato=$(".form_tec_liq").serialize();
        
        $.ajax({
         url:"dinamic/proyecto_consulta_dinamic_2.php",
         type: 'POST',
         data: dato,
         success: function (data, textStatus, jqXHR) {
            $(".p_msn_ajax_exito").show().delay(3000).fadeOut("slow");
                
              
         },
         error: function (a,b,c){
             $(".p_msn_ajax_error").show().delay(4000).fadeOut("slow");
             
            }
        });
        return false
        
    }
   
   
   
   function guardar_dis(){
        //alert($("#form_dis").serialize());
        
         var dato=$("#form_dis").serialize();
        
        $.ajax({
         url:"dinamic/proyecto_consulta_dinamic_2.php",
         type: 'POST',
         data: dato,
         success: function (data, textStatus, jqXHR) {
             //$("#tabs2").html(data);
             
              //alert('si')
         $(".p_msn_ajax_exito").show().delay(3000).fadeOut("slow");
                
              
         },
         error: function (a,b,c){
             $(".p_msn_ajax_error").show().delay(4000).fadeOut("slow");
             
            }
        });
        return false
        
    }
   
    function guardar_tec(){
        //alert($(".form_tec").serialize());
        
         var dato=$(".form_tec").serialize();
        
        $.ajax({
         url:"dinamic/proyecto_consulta_dinamic_2.php",
         type: 'POST',
         data: dato,
         success: function (data, textStatus, jqXHR) {
            $(".p_msn_ajax_exito").show().delay(3000).fadeOut("slow");
                
              
         },
         error: function (a,b,c){
             $(".p_msn_ajax_error").show().delay(4000).fadeOut("slow");
             
            }
        });
        return false
        
    }
    
    
    function guardar_fot(){
        //alert($("#form_fotos").serialize());
        return false;
    }
    /*$('.fancybox-thumbs').fancybox({
            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,
            arrows    : false,
            nextClick : true,

            helpers : { 
                    thumbs : {
                            width  : 50,
                            height : 
                    }
            }
    });*/
    
    ///Tema///
    $(".borrar_tem").on('click',borrar_tema);
    $(".editar_tem").on('click',editar_tema);
    
    function borrar_tema(){
        if (!confirm('Estas seguro de querer borrar este tema?')){
            return false;
        }
    }
    function editar_tema(){
        //alert();
        $("#nom").val($(this).attr('title'));
        $("#editar").val($(this).attr('href'))
        //alert($(this).attr('title'));
        
        return false;
    }
    
    
////departamento y municipio
    $(".dep_error").hide();
    $(".mun_error").hide();
    $("#dep_grilla").on('click','#editar_dep', editar_dep);
    $('#dep_submit').on('click', validar_dep);
    $('#mun_submit').on('click', validar_mun);
    
    function validar_mun(e){
        if ($("#mun").val()==''){
                $(".mun_error").eq(0).show();
                e.preventDefault();
        }else{
            $(".mun_error").eq(0).hide();
        }
        if ($("#dep_mun").val()==''){
                $(".mun_error").eq(1).show();
                e.preventDefault();
        }else{
            $(".mun_error").eq(1).hide();
        }
    }

    function validar_dep(){
        if ($("#dep").val()==''){
                $(".dep_error").show();
                return false;
        }
    }

    function editar_dep(){
        $("#dep").val($(this).attr('title'));
        $("#editar_dep_hidden").val($(this).attr('href'))
        //alert($(this).attr('title'));
        
        return false;
    }
    $("#mun_grilla").on('click','#editar_mun', editar_mun);

    function editar_mun(){
        $("#mun").val($(this).attr('title'));
        $("#editar_mun_hidden").val($(this).attr('href'));
        $(".mun_submit").attr('id','otro');
        //$("#dep_mun").change(2);
        //$("#dep_mun").val()=='sj';
        //alert($(this).attr('title'));
        
        return false;
    }
    
///////////banco  
    $(".validacion_error").hide();
    $("#boton_guardar_p").on('click', validar_ban);
    
    function validar_ban(){
        if ($("#ban").val()==''){
                $(".validacion_error").show();
                return false;
        }
    }
    
/////////Conf perfil    
    //alert($("#vista").width());
}

