<?php
require_once ('conf/conexao.class.php');
require_once ('conf/controller.php');

session_start();
if(!isset($_SESSION['email']) OR empty($_SESSION['email'])){
	header("location: logout.php");
}

$query="SELECT green_prazo, gold_prazo, red_prazo FROM tb_controle WHERE empresa={$_SESSION['id_Empresa']}";
$GLOBALS['db']->execute($query);
$result = $GLOBALS['db']->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<head>
	<link rel="stylesheet" type="text/css" href="styleIrfm.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<link rel="shortcut icon" href="../img/favicon.ico" >
	<title>ValidaCom</title>
	<style type="text/css">
	
	</style>
</head>

<body>

<!-- Uma serie de div com topos de cores diferentes podendo ou não minimiza-las
para cada cor de um, é como se fosse um menu de configurações -->

<div id="configSetOP" class="configMenus">
	<div id="topoOP"><i style="float:left;margin-right:15px;padding:5px;" class="fa fa-cogs"></i> <label style="padding:10px;float:left;margin-top:-5px;">Configuração de avisos </label><i style="float:right;cursor:pointer;" class="fa fa-angle-down"></i></div>
	<div style="padding:10px;">
	<!-- conteudo da div -->

		<form id="formSetting" style="margin-bottom:10px;">			
		<div style="float:left;margin-right:10px;"><div style="background-color:yellowgreen;width:30px;height:27px;float:left;"></div><input type="number" id="inpPrazo" name="green_prazo" style="width:50px;" maxlength="3" pattern="[0-9]" value="<?php if($result['green_prazo'] != ''){echo $result["green_prazo"];} ?>"></div>		
		<div style="float:left;margin-right:10px;"><div style="background-color:gold;width:30px;height:27px;float:left;"></div><input type="number" id="inpPrazo" name="gold_prazo" style="width:50px;" maxlength="3" pattern="[0-9]" value="<?php if($result['gold_prazo'] != ''){echo $result["gold_prazo"];} ?>"></div>			
		<div style="float:left;margin-right:10px;"><div style="background-color:#EB3E35;width:30px;height:27px;float:left;"></div><input type="number" id="inpPrazo" name="red_prazo" style="width:50px;" maxlength="3" pattern="[0-9]" value="<?php if($result['red_prazo'] != ''){echo $result["red_prazo"];} ?>"></div>
		<div style="float:left;width:13px;height:13px; cursor:pointer; padding:3px;text-align:center;font-size:12px;background-color:#F0F0F0; color:orangered;"> <i class="fa fa-question"></i> </div>
		<br>
		<label style="display:none;">Insira a diferença de dias, entre a data de validade do produto e a data atual, para cada tipo de aviso. <br> Ex.: Verde: 120 dias Amarelo: 60 dias Vermelho: 30 dias</label>
				 
		</form>
	</div>
</div>
<div id="form_footer" style="margin-top:5px;">
	<div class="bottom" id="orange" style="margin-top:15px;">Salvar <i class="fa fa-angle-double-right"></i> </div>
</div>
	
</body>
</html>

<script type="text/javascript">
		
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
	var expanded = false;
    function menu() {
    	if (!expanded) {
            $("#menu").show(300);	
            expanded = true;

        } else {
            $("#menu").hide(300);
        }
    }
    function logout() {
        document.location = 'logout.php';
    }

    var expanded = false;
    function showPerfil() {        
        if (!expanded) {
            $("#perfil").show(300);			
            $("#abrfch").css("right","10%");
            $("#englobaLista").css("width","90%");            
            expanded = true;

        } else {
            $("#perfil").hide("slow");
            $("#abrfch").css("right","0%");
            $("#englobaLista").css("width","100%");
            expanded = false;
        }
    }

    function cadastra(){
    	var content_form = $('#formSetting').serializeArray();    	
		$.ajax({
		    type: 'POST',
		    url: "conf/controller.php",
		    data: {conteudo:content_form, oper:"update", tb_insert:"tb_controle"},
		    dataType:'html',
		    success: function(x){
		    	if(x==""){		    		
		    		alert("Produto cadastrado");		    		
		    	}else{		    		
		    		alert("Erro ao cadastrar");
		    	}		    	 
		    },
		    beforeSend: function(){

		    }
		}); 
	}	

</script>