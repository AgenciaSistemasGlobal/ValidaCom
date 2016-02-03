<?php
require_once ('conf/conexao.class.php');
require_once ('conf/controller.php');

session_start();
if(!isset($_SESSION['email']) OR empty($_SESSION['email'])){
	header("location: logout.php");
}
?>
<!DOCTYPE html>
<html>
<head>	
	<link rel="stylesheet" type="text/css" href="styleIrfm.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/MascaraValidacao.js"></script>

	<link rel="shortcut icon" href="../img/favicon.ico" >
	<title>ValidaCom</title>

	</head>
<body>

<style type="text/css">

	#tabela{
	    border: 1px solid #D0D0D0;
	    border-collapse: collapse;
	}
	.trTabela, .tdTabela {
	    padding: 15px;
	    border: 1px solid #D0D0D0;
	    border-collapse: collapse;
	}

</style>
<div id="passos">

	<div id="passo1" class="active passosClas">1</div>
	<label class="lblpasso">Informações únicas</label>
	<div id="passo2" class="passosClas">2</div>
	<label class="lblpasso">Localização</label>
	<div id="passo3" class="passosClas">3</div>
	<label class="lblpasso">Informações de entrada</label>
	<div id="passo4" class="passosClas">4</div>
	<label class="lblpasso">Controle de validades</label>

	<div id="progressbar"><div id="progress" style="width:25%;"> </div></div>

</div>
<br><br><br><br><br><br><br>
<form id="englobaCadastro" method="post" name="formcadastro">

	<label style="font-size:28px;float:left;color:gray;" id="infoTopo">Vamos cadastrar seus produtos ...</label>
	<br><br><br><br>
	<!-- <label id="" class="lblPrdt">Imagem ilustrativa do produto</label><br />
	<input type="file" name="imagem" id="cod_prdt" class="inptPrdt" style="width:320px;border:none;"> -->
	<div id="sectionPasso1"> 
	
		<table style="width:100%;" id="tabela">
			<tr class="trTabela">
				<span>
					<td class="tdTabela">C&oacute;digo de barras <i class="requered">?</i></td>
					<td class="tdTabela"><input type="text" name="codigo" id="cod_prdt" class="inptPrdt" style="width:450px;" required></td>
				</span>
			</tr>
			
			<tr class="trTabela">
				<span >
					<td class="tdTabela">Nome do produto <i class="requered">?</i></td>				
					<td class="tdTabela"><input type="text" name="nome" id="nome" class="inptPrdt" style="width:450px;" required></td>
				</span>			
			</tr>			
			
			<tr class="trTabela">
				<span style="">
					<td class="tdTabela">Descri&ccedil;&atilde;o do produto <i class="requered"><a href="">?</a></i></td>
					<td class="tdTabela"><input type="text" name="descricao" id="desc_prdt" class="inptPrdt" style="width:450px;" required></td>
				</span>
			</tr>
			
			
		</table>
	</div>
	
	<div id="sectionPasso2" style="display:none;">
	
		<table style="width:100%;" id="tabela">

			<tr class="trTabela"> 
				<span style="">
					<td class="tdTabela">Fornecedor do produto <i class="requered"><a href="">?</a></i></td>
					<td class="tdTabela"><input type="text" name="fornecedor" id="fornc_prdt" class="inptPrdt" style="width:450px;" required></td>
				</span>
			</tr>									

			<tr class="trTabela">
				<span>					
					<td class="tdTabela">Corredor <i class="requered"><a href="">?</a></i></td>						
					<td class="tdTabela"><input type="text" name="corredor" id="corredor_prdt" class="inptPrdt" style="width:450px;" required></td>							
				</span>
			</tr>
			
			<tr class="trTabela">
				<span>					
					<td class="tdTabela">Prateleira que ser&aacute; alocado o produto <i class="requered"><a href="">?</a></i></td>						
					<td class="tdTabela"><input type="text" name="prateleira" id="prateleira_prdt" class="inptPrdt" style="width:450px;" required></td>					
				</span>
			</tr>													
			
		</table>

	</div>

	<div id="sectionPasso3" style="display:none;">
		<table style="width:100%;" id="tabela">

			
			
			<tr class="trTabela">
				<span>
					<td class="tdTabela">Categoria do produto <i class="requered"><a href="">?</a></i></td>						
					<td class="tdTabela"><input type="text" name="categoria" id="cat_prdt" class="inptPrdt" style="width:450px;" required></td>
				</span>
			</tr>

			<tr class="trTabela">
				<span style="float:left;">
					<td class="tdTabela">Pre&ccedil;o unit&aacute;rio do produto <i class="requered"><a href="">?</a></i></td>
					<td class="tdTabela"><input type="text" name="preco_unitario" id="preco_prdt" maxlength="10" class="inptPrdt" style="width:450px;" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" required></td>
				 </span>
			 </tr>

			 <tr class="trTabela">
				<span>
					<td class="tdTabela">Quantidade de entrada <i class="requered"><a href="">?</a></i></td>
					<td class="tdTabela"><input type="text" name="qtdn_Entrada" id="qtd_prdt" class="inptPrdt" style="width:450px;" required></td>
				</span>
			</tr>

		</table>
	</div>		

	<div id="sectionPasso4" style="display:none;">
		<table style="width:100%;" id="tabela">				
	 		
	 		<tr class="trTabela">
				<span style="float:left;" class="umtodo">
					<td class="tdTabela">Lote <i class="requered"><a href="">?</a></i></td>
					<td class="tdTabela"><input type="text" name="lote" id="lote_prdt" class="inptPrdt" style="width:450px;" required></td>
				</span>
			</tr>
			 
			<tr class="trTabela">
				<span style="float:left;">
					<td class="tdTabela">Data de fabrica&ccedil;&atilde;o <i class="requered"><a href="">?</a></i></td>
					<td class="tdTabela"><input type="text" name="dt_fabricacao" id="dtFabric_prdt" class="inptPrdt" style="width:450px;" onKeyPress="MascaraData(formcadastro.dt_fabricacao);"
					maxlength="10" onBlur="(ValidaData.dt_fabricacao);"></td>
				</span>
			</tr>
			
			<tr class="trTabela">
				<span style="float:left;" class="umtodo">
					<td class="tdTabela">Data de validade <i class="requered"><a href="">?</a></i></td>
					<td class="tdTabela"><input type="text" name="dt_validade" id="dtValidade_prdt" class="inptPrdt" style="width:450px;" onKeyPress="MascaraData(formcadastro.dt_validade);"
				maxlength="10" onBlur="(ValidaData.dt_validade);"></td>
			</span>
			</tr>

	 	</table>	 		 

	 </div>
</form>

<br/><br/>

<div id="form_footer">
	<div class="bottomOr" id="orange">Continue <i class="fa fa-angle-double-right"></i> </div>	
</div>
<div id="testedaporra">	
	<label id="titExpl"></label>
	<p></p>
</div>
	<script type="text/javascript">
	$('.requered').mouseenter(function(){
		$('#explicaCadastroProduto').show();
	});

	$(document).ready(function(){
	    $(document).keydown(function(event) {
	        var enter = event.keyCode
	 	if(enter == 13){

		 		if ( $("#orange").hasClass("bottomOrB") ) {
		 			cadastra();
		 			next();
		 		}else{
		            next(); 
		 		}
	        }
	    });		    
	});
		
	var passo = 1;
	$("#orange").click(function(){	
		var largura = $('#progress').width();	
		passo++;
		passa(passo, largura);		
	});
	
	function next(){

		var largura = $('#progress').width();	
		passo++;
		passa(passo, largura);
	}

	function passa(passo, largura){

		var soma = largura + 313;	
		var passoSub = passo - 1;
			
		$("#progress").animate({"width": soma+"px"}, 1000);	
			
		$("#sectionPasso"+passoSub).hide("slow");
		$("#sectionPasso"+passo).show("slow");

		$("#passo"+passo).addClass("active");
		$("#passo"+passoSub).removeClass("active");
		$("#passo"+passoSub).addClass("japassou");

		if (passo == 4) {		
			$("#orange").removeClass("bottomOr");
			$("#orange").addClass("bottomOrB");
			$('#orange').html("Finalizar cadastro<i class='fa fa-angle-double-right'></i>");
		};

		if (passo >= 5) {
			$('#progress').css("background-color","rgb(154, 205, 50)");
			$('#orange').html("<i class='fa fa-check'></i>");
			$('#infoTopo').html("Produto cadastrado com sucesso!");
			$('#infoTopo').css("color","rgb(154, 205, 50)");				
		};

		$(".bottomOrB").click(function(){
			cadastra();
		});
	}

	function cadastra(){

		var dadosForm = $("form").serializeArray();	
		var empresa = <?php echo $_SESSION["id_Empresa"]; ?>;
		//console.log(dadosForm);

		$.ajax({
	    	type:'post',
	    	url:'conf/controller.php',
	    	dataType:'html',
	    	data: {dadosForm:dadosForm, oper:"insertPrdt", tb_insert:"tb_produto", empresa:empresa},
	    	sucess:function(retorno){
	    		alert(retorno);
	    	},

	    	beforeSend:function(){

	    	},
	    	comlpete:function(){

	    	}
	    });
	}
	</script>

</body>
</html>
