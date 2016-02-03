<?php
session_start();

require_once ('conf/conexao.class.php');
require_once ('conf/controller.php');

if(!isset($_SESSION['email']) OR empty($_SESSION['email'])){
	header("location: logout.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<head>

	<link rel="stylesheet" type="text/css" href="style.css">	
	<!-- <link href="../bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>	
	<link rel="shortcut icon" href="../img/favicon.ico" >
	<link rel="stylesheet" href="../font/font-awesome-4.4.0/css/font-awesome.min.css">
	<title>ValidaCom</title>
</head>
</head>
<body>
<div class="topoFixed">
	<div class="logo">	 	 
	</div>

	<div class="menu" id="left">	
	 
	 	<!--
	 	<div id="btn" class="logOut" onclick="logout();"></div>	 	
	 	<div id="btn" class="setting"></div>
	 	<div id="btn" class="perfil"><div id="setaDown"></div></div>
	 	<div id="btn" class="menuIcon" onclick="menu();"></div> 
	 	-->
		<div id="perfil">									
			<img src="users/perfil/perfil-11.jpg" border="0" height="40" width="40">
			<label><?php echo $_SESSION['nome']; ?><i class="fa fa-angle-down"></i></label>
		</div>
		<div id="showPerfil">
			<label id="subShowPerfil">
				<i class="fa fa-sign-out"></i>
				Sair
			</label>
		</div>

	</div>


</div>

<div id="menu">
	<!-- Menu vertical -->
	
	<div id="openMenu"> <i class="fa fa-bars"></i> </div>

	<div class="bottomVert" onclick="OpenPg(2);" id="2"><i class="fa fa-eye"></i></div>
	
	<div class="bottomVert" onclick="OpenPg(insPrdt);" id="insPrdt"><i class="fa fa-pencil-square-o"></i></div>

	<div class="bottomVert" onclick="OpenPg('setting');" id="setting"><i class="fa fa-wrench"></i></div>

	<div class="bottomVert" onclick="OpenPg('estac');" id="estatis"><i class="fa fa-bar-chart"></i></div>
</div>



<iframe id="ifrmContent" src=""></iframe>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		var pagina = "insPrdt";
		OpenPg(pagina);
		marcaMenu(pagina);
	});
	function OpenPg(ox){
		arq="tl_"+ox+".php";		
		$('#ifrmContent').attr("src",arq);
		/*$("#menu").animate({width: '0%'});
		$('#ifrmContent').animate({width: "100%", left: "0%"}, 1100);
        expanded = false;*/
	}	
	$('.temais').mouseenter(function(){		
	    $("#listaMenu").css("color","white");	
	    $("#listaMenu").css("border-color","white");
	});
	$('.temais').mouseout(function(){		
	    $("#listaMenu").css("color","gray");	
	    $("#listaMenu").css("border-color","gray");
	});
	var expanded = false;
	$('.temais').click(function(){
		if (!expanded) {
            $("#temmais").css("display","block");
            $("#listaMenu").css("color","white");
            $("#listaMenu").css("border-color","white");
            expanded = true;

        } else {
            $("#temmais").css("display","none");
            $("#listaMenu").css("color","gray");
            $("#listaMenu").css("border-color","gray");
            expanded = false;
        }
	});	
    function menu() {
    	if (!expanded) {
            /*$("#menu").animate({width: 'toggle'});
            $('#menu').animate({width: "5%"}, 1000);*/
            $('.logo').css("-webkit-animation","out 1s");
            /*$('#ifrmContent').animate({width: "95%", left: "5%"}, 1100);*/
            expanded = true;

        } else {
            /*$("#menu").animate({width: 'toggle'});*/
            $('.logo').css("-webkit-animation","in 1s");	
            /*$('#ifrmContent').animate({width: "100%", left: "0%"}, 1100);*/
            expanded = false;
        }
        
        
        
    }
    function logout() {
        document.location = 'logout.php';
    }    
	
    /*function perfil() {        
        if (!expanded) {
            $("#perfilNew").show(300);            
            expanded = true;

        } else {
            $("#perfilNew").hide("slow");                        
            expanded = false;
        }
    }*/
    
    
    $(document).ready(function(){    		    
    	arr_colunas = Array("login", "email", "nome");	
    	var jsonStringColunas = JSON.stringify(arr_colunas);
    	arr_valores = Array("murilo", "mu@gmail.com", "murilo eduardo");	
    	var jsonStringValores = JSON.stringify(arr_valores);
    	var insert_tb = "tb_usuario";
	    $.ajax({
	    	type:'post',
	    	url:'conf/controller.php',
	    	dataType:'json',
	    	data:{oper:'insert', arr_colunas:jsonStringColunas, arr_valores:jsonStringValores, insert_tb:insert_tb},
	    	sucess:function(retorno){
	    		alert(retorno);
	    	},
	    	beforeSend:function(){

	    	},
	    	comlpete:function(){

	    	}
	    });

    });

    function marcaMenu(id){

    	$('#'+id).each(function(){ 
			$(this).removeClass("bottomVertClass");
			$(this).css("width","45px");
		});    		    		

		$('#'+id).addClass("bottomVertClass");
		$('#'+id).css("width","42px");
    }

    $('.bottomVert').each(function(){
    	$(this).on("click", function(){
    		
    		$('.bottomVert').each(function(){ 
    			$(this).removeClass("bottomVertClass");
    			$(this).css("width","45px");
    		});    		    		

    		$(this).addClass("bottomVertClass");
    		$(this).css("width","42px");

    	});    	
    });	
    
	/*$(document).ready(function() {
       $("#perfil").toggle(
           function() {
	           var widthPai = $(this).css("width");
		       $('#showPerfil').css("width", widthPai);
			   $('#showPerfil').slideDown('slow');
           },
           function() {
               $(this).slideUp('slow');
           }
       );
   });*/
    

</script>
