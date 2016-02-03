<?php
session_start();
$welcom=false;
!isset($_SESSION['email']) OR empty($_SESSION['email'])?$welcom=false:$welcom=true;	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge; chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <meta name="description" content="Seu estabelecimento, graças ao seu esforço diário, e muito trabalho soado, 
	cresceu de forma considerável e, derrepente você se depara com uma quantidade 
	absurda de produtos espostos, e suas datas de validade vencendo. Você tendo 
	que ver produtos indo para área de descarte, sabendo que aquilo,
	é visívelmente dinheiro sendo jogado fora.  
	  
	  Acreditamos que seu estabelecimento cresceu e você precisa controlar o 
	disperdicio e evitar deixar de faturar com todos os produtos, de todas as formas 
	possíveis. ValidaCom veio com o intuito, de dar a você, gestor de estoque, ou
	gerente de loja, o absoluto controle sobre as validades dos produtos expostos.">

    <meta name="title" content="Controle de produtos vencidos" />

    <meta name="keywords" content="extra alimentos, Controle de produtos vencidos, validade, prazos, prazo, validades, produto, produtos, controle, controles, produtos pereciveis, 
	produto perecivel, gestao de estoque, controle de estoque, relatorios, graficos, 
	relatorio, grafico, avisos sonoros de produtos chegando na data de validade,
	data, datas, data de validade, datas de validade, controle de estoque de alimentos,perecivel,
	embalagem para congelados, 1 kilo de alimento não perecivel " />

    <meta name="copyright" content="Sistemas Global">
    <meta name="owner" content="http://www.sistemasglobal.com.br" />
    <meta name="author" content="Sistemas Global + Web" />

    <meta http-equiv="content-language" content="pt-BR" />
    <meta name="robots" content="index,follow" />
    <meta name="GOOGLEBOT" content="index,follow" />
    <meta name="mssmarttagspreventparsing" content="true" />
    <meta name="revisit-after" content="2 days" />   
    <meta name="AUDIENCE" content="all" />
	<meta name="LANGUAGE "content="pt-BR" />
	<meta name="DISTRIBUTION" content="Global" />
	<meta name="ROBOTS" content="index,follow" /> 
  
    <meta property="og:image" content="http://www.validacom.com/img/favicon.ico" />
    <meta property="og:title" content="Controle de produtos vencidos" />
    
    <meta property="og:description" content="Seu estabelecimento, graças ao seu esforço diário, e muito trabalho soado, 
	cresceu de forma considerável e, derrepente você se depara com uma quantidade 
	absurda de produtos espostos, e suas datas de validade vencendo. Você tendo 
	que ver produtos indo para área de descarte, sabendo que aquilo,
	é visívelmente dinheiro sendo jogado fora.  
	  
	  Acreditamos que seu estabelecimento cresceu e você precisa controlar o 
	disperdicio e evitar deixar de faturar com todos os produtos, de todas as formas 
	possíveis. ValidaCom veio com o intuito, de dar a você, gestor de estoque, ou
	gerente de loja, o absoluto controle sobre as validades dos produtos expostos." />

    <meta property="og:url" content="http://www.validacom.com" />
    <meta property="og:site_name" content="Controle de produtos vencidos" />
    <meta property="og:type" content="website" />	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	
	<script src="js/jquery.js"></script>
	<!-- Posicione esta tag no cabeçalho ou imediatamente antes da tag de fechamento do corpo. -->
	<script src="https://apis.google.com/js/platform.js" async defer>
	  {lang: 'pt-BR'}
	</script>
 
	<!-- <script src="js/jquery-ui.js"></script> -->

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="modal.css">
	<link rel="stylesheet" type="text/css" href="font/font-awesome-4.4.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="img/favicon.ico" >

	<title>ValidaCom</title>
</head>
<body id="Topo">
	
	
	
	<!-- Incio modal -->
	<div id=":" class="modalDialog">
		<div>
			<a class="close" title="Fechar" href="#::">X</a>
			<form id="formularioContato" method="post">
				<div class="content">
					<span class="error" id="error">Email e/ou senha invalidos</span>
					<span class="error1" id="error">Email invalido</span>
					<span class="error2" id="error">Email n&atilde;o existe</span>
					<label for="login" class="descricoes">Email<br><input id="login" type="text"></label><p>					
					<label for="pass" class="descricoes">Senha<br><input id="pass" type="password"></label><p>					
					<a href="" class="esqueceuSenha">E agora? Esqueci a senha!</a><p>					
					<span class="logar" id="btnEntrar" onclick="logar();">Logar</span>
					<div id="resultados">
						<span id="loading">
							<img src="img/loading.gif" border="0" height="11" width="43">
						</span>
					</div>
				</div>
			</form>		
		</div>
	</div>
	<!-- Fim modal -->

	<!-- Inicio caixa do topo fixo -->
	<div id="topoFixed" class="transparentItens fixo">
		 <div class="logo">
		 <img src="img/GlobalOfficial.png" border="0">
		 </div>

		 <div class="menu">

		 	<!-- <a href=<?php if($welcom){echo "app/";}else{echo "#:";} ?> ><span class="letters"><?php if($welcom){echo "Ol&aacute; ".$_SESSION['nome']."! Fique a vontade";}else{echo "Login";} ?></span></a>-->
		 	 <span class="none" style="color:darkorange !important;">Conheça o projeto</span>		 	  
		 	 <span class="none" style="color:darkorange !important;">Contato</span> 		 	 
		 	 <a href=<?php if($welcom){echo "app/";}else{echo "#:";} ?> ><span class="letters transparentOrange"><?php if($welcom){echo "Ol&aacute; ".$_SESSION['nome']."! Fique a vontade";}else{echo "Login";} ?></span></a>
		 	<!-- <span class="letters" id="experimente">Experimente grátis, agora mesmo</span> -->
		 	<span class="letters" id="experimente" style="border-radius:5px;">Cadastre-se</span>
		 	
		 </div>
	</div>
	<!-- Fim caixa do topo fixo -->

	<!-- Inicio da div com background fixo e caixas se movendo -->	
	<div class="divRolate bgParallax" data-speed="15">
		<!-- Inicio caixa do topo fixo -->
	<div id="topoFixed" class="transparentItens">
		 <div class="logo">
		 <img src="img/GlobalOfficial.png" border="0">
		 </div>

		 <div class="menu">

		 	<!-- <a href=<?php if($welcom){echo "app/";}else{echo "#:";} ?> ><span class="letters"><?php if($welcom){echo "Ol&aacute; ".$_SESSION['nome']."! Fique a vontade";}else{echo "Login";} ?></span></a>-->
		 	 <span class="none">Conheça o projeto</span>		 	  
		 	 <span class="none">Contato</span> 
		 	 <a href=<?php if($welcom){echo "app/";}else{echo "#:";} ?> ><span class="letters transparent"><?php if($welcom){echo "Ol&aacute; ".$_SESSION['nome']."! Fique a vontade";}else{echo "Login";} ?></span></a>
		 	 
		 	<!-- <span class="letters" id="experimente">Experimente grátis, agora mesmo</span> -->
		 	<span class="letters" id="experimente" style="border-radius:5px;">Cadastre-se</span>
		 	
		 </div>
	</div>
	<!-- Fim caixa do topo fixo -->		

		<div id="flyer1">
			Ganhe mais <strong>confian&ccedil;a</strong> dos seus clientes.		
		</div>	
		<br><br><br><br>

		<div id="flyer2">
			Reduza para <strong>ZERO</strong> o n&uacute;mero de produtos perdidos por validade.
		</div>
		<br><br><br><br>	

		<div id="flyer3">
			Saiba quanto deixou de perder com <strong>produtos vencidos</strong>, todo m&ecirc;s.			
		</div>

	</div>
	<!-- Fim da div com background fixo e caixas se movendo -->
	<div id="experimenteEmail">
		<input type="email" id="emailCadastreSe" placeholder="Gostaria de reduzir para 0 o número de produtos vencidos? Experimente, deixe seu email ...">
	</div>
	<!-- Inicio de todo resto do corpo -->
	<div id="corpo">
		
		<!-- Inicio da parte de suporte -->
		<img id="logozao" src="img/GlobalOfficial2.png" border="0"><p>
		<span class="titulo" style="color: #F6AF3D;"> Suporte <strong style="color:#EB3E35;">nota 10</strong>, 24 horas por dia </span><p>			
		<span class="subTitulo" >Estamos ao seu lado para garantir que entenda e explore ao máximo a ferramenta.</span><p>					
		<br><br>

		<div id="suporteContainer">
			<div style="float:left;width:400px;margin-left:20px;">
			<div id="suporte1">
				<div id="iconesSuporte1"><i class="fa fa-file-text-o"></i></div>
				<div style="margin-top:12px;"></div>
				Além dos nossos consultores, ajudaremos<br> 
				voc&ecirc; passo a passo
				a utilizar <font color="#EB3E35">todas funcionalidades</font> do sistema.
			</div>
			</div>
			
			<div style="float:left;width:400px;margin-left:20px;">
			<div id="suporte2">
				<div id="iconesSuporte2"><i class="fa fa-headphones"></i></div>
				<div style="margin-top:8px;"></div>
				Prefere falar conosco? 
				Somos da sua equipe.<br> 
				<font color="#EB3E35">Ligue (51)3226 3653.</font>
			</div>
			</div>
			
			<div style="float:left;width:400px;margin-left:20px;">
			<div id="suporte3">
				<div id="iconesSuporte3"><i class="fa fa-commenting-o"></i></div>
				<div style="margin-top:12px;"></div>
				Se apareceu uma dúvida, 
				clique em <font color="#EB3E35">"ajuda"</font> 
				e abra um Chat imediatamente com nossa equipe.
			</div>
			</div>		
		</div>
		<br><br><br><br><br><br><br><br><br>
		<!-- Fim da parte de suporte -->
		
		<!-- Inicio SOBRE do site -->
		<div id="explicacao" class="bgParallax" data-speed="15">
				<div class="verticalLine"></div>
				<label id="func">Sobre o ValidaCom</label>
		</div>
		
		<p class="texto">
			
			<div id="txtClm1">
				<div id="flat" class="two"></div>
				<strong>Porque ValidaCom <br>surgiu?</strong><p><span class="paragrafo" style="margin-right:30px;"></span>Veio com intuito de trazer <br>benefícios ao cliente e sua empresa <br>do dia-a-dia, garanta a confiabilidade total do maior patrimônio da sua empresa, seus clientes.
				Você que é gerente de loja e busca maior administração sobre seus produtos expostos nas prateleiras, esta aqui uma solução pratica e recomendada, um módulo online especializado para o controle total das validades dos produtos.</p>
				<p><span class="paragrafo" style="margin-right:30px;"></span>Que visa trazer informações sumarizadas de gastos desnecessários obtidos todos os meses, gráficos comparativos, informações sobre leis e direitos atualizadas, relatórios para gestores e muito mais.
				Melhorias personalizadas mediante pedidos formais de  acordo com a necessidade.</p>
			</div>

			<div id="txtClm2">			
				<div id="flat" class="one"></div>
				<strong>Acredite, vale a pena.</strong>			
				<p><span class="paragrafo" style="margin-right:30px;"></span>Seu estabelecimento, graças <br>ao seu esforço diário, e muito <br>trabalho soado, 
				cresceu de <br>forma considerável e, derrepente <br>você se depara com uma quantidade 
				absurda de produtos espostos, e suas datas de validade vencendo. Você tendo 
				que ver produtos indo para área de descarte, sabendo que aquilo,
				é visívelmente dinheiro sendo jogado fora.</p>  			  
				<p><span class="paragrafo" style="margin-right:30px;"></span>Acreditamos que seu estabelecimento cresceu e você precisa controlar o 
				disperdicio e evitar deixar de faturar com todos os produtos, de todas as formas 
				possíveis. ValidaCom veio com o intuito, de dar a você, gestor de estoque, ou
				gerente de loja, o absoluto controle sobre as validades dos produtos expostos.</p>
			</div>		
		</p>
		<!-- Fim SOBRE do site -->

		<!-- Inicio da parte Experimente. Primeira parte onde o
		usuario so coloca o email -->
		<div id="Supfooter" class="bgParallax" data-speed="15">
			
			<div style="20px;">
				<label id="titCadastreseGratis">Crie sua conta <strong>gr&aacute;tis</strong></label>
				<br>
				<label id="descCadastreseGratis">Gr&aacute;tis at&eacute; 5 produtos, 1 usu&aacute;rio, suporte online.</label>
			</div>

			<div style="margin-top:30px;margin-bottom:20px;">
				<input type="text" name="" id="cadastreGratis" placeholder="Seu e-mail por favor">
				<span class="" id="btnCadastreGratis" onclick="experimente();"><label>Comece agora</label></span>
			</div>
			<style>
				.rinbal{
					text-decoration: none;					
				}
				.rinbal:hover{
					text-decoration: underline;
				}
			</style>
			<a href="https://www.validacom.com/terms.html" target="_blank" class="rinbal" >Ao criar a conta, você estará aceitando os Termos e Condições do site</a>
		</div>
		<!-- Fim da parte Experimente. Primeira parte onde o
		usuario so coloca o email -->

		<!-- Inicio da parte Experimente. Segunda parte onde o
		usuario depois de cadastrar o email deseja se quer fazer um
		comentario -->
		<div id="texto">
			<p>Bom, agradecemos seu cadastro. O sistema ainda est&aacute; em desenvolvimento.</p>
			<p>Sua conta cadastrada antes do t&eacute;rmino do sistema, ter&aacute; outro valor, portanto assim que pronto
			entraremos em contato pelo seu email sobre sua conta VIP.</p>
			<p style="font-size:26px;">Gostaria de ajudar com uma sugest&atilde;o ou coment&aacute;rio?<br>
			<form id="comentario">
				<textarea name="comentarioText" id="comentarioText"></textarea>				
				<p><span class="botaocadastrar" id="botaoverde" onclick="comente();"><label>Enviar</label></span></p>				

				<div id="imgLoad">
					<img src="img/loader.gif" border="0" height="11" width="43">
				</div>

				<div id="fecharCad">
					x
				</div>

			</form>
			</p>
		</div>
		<!-- Fim da parte Experimente. Segunda parte onde o
		usuario depois de cadastrar o email deseja se quer fazer um
		comentario -->
		
		<!-- Inicio da parte footer do site -->	
		<div id="footer">
			<p>Vers&atilde;o 8.15 - © 2015 desenvolvido e mantido por <a href="#">Global Sistemas</a>. Todos os direitos reservados.</p>			
			<div id="voltarAOTopo">
				<i class="fa fa-arrow-circle-o-up" onclick="$j('html,body').animate({scrollTop: $j('#Topo').offset().top}, 2000);" id="BtnVoltarTopo"></i>
			</div>
			
			<img id="logozao" src="img/GlobalOfficial2.png" border="0" style="position:absolute;left:50%;right:50%;bottom:5px;width:20px;height:20px;opacity: 0.45;">
			
			<div id="contato">
				<span>Fale conosco</span>
				<br><br>
				<label><i class="fa fa-envelope-o"></i>contato@validacom.com </label>
				<br>
				<label><i class="fa fa-phone"></i>(51)3223 3653</label>
				<br><br>
				<!-- Posicione esta tag onde você deseja que o botão +1 apareça. -->
				<div class="g-plusone" data-annotation="inline" data-width="300"></div>
			</div>
		</div>
		<!-- Fim da parte footer do site -->	
	
	</div>
	<!-- Fim de todo resto do corpo -->

</body>
</html>
<script>		
	$('#experimente').click(function() {
		$('body,html').animate({scrollTop:1600},2000);
	});

$(document).ready(function(){
	$("#ocultar").click(function(event){
	  event.preventDefault();
	  $("#capaefectos").hide("slow");
	});
 
	$("#mostrar").click(function(event){
	  event.preventDefault();
	  $("#capaefectos").show(300);
	});
});

	var expanded = false;    
    function showSearch() {
        var checkboxes = document.getElementById("inpSearch");
        if (!expanded) {
            $("#capaefectos").show(300);
            expanded = true;

        } else {
            $("#capaefectos").hide("slow");
            expanded = false;
        }
    }
    	    	
		// função jquery
		$(document).ready(function(){
		    $(document).keydown(function(event) {
		        var enter = event.keyCode
		 	if(enter == 13){
		            logar(); 
		        }
		    });		    
		});

    	function logar(){ 
    		$('.error').css({display:"none"});
    		$('.error1').css({display:"none"});
    		$('.error2').css({display:"none"});
    		var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    		if($('#login').val() == ""){    			
    			$('#login').css('border-color', '#CC0000');    			    		
    		}else{
    			$('#login').css('border-color', '#B0B0B0');	
    		}
    		if($('#pass').val() == ""){    			
    			$('#pass').css('border-color', '#CC0000');    			
    		}else{
    			$('#pass').css('border-color', '#B0B0B0');	
    		}
    		
    		if(filtro.test($('#login').val()) || $('#login').val()=="admin" || $('#login').val() == ""){
    			$('.error1').css({display:"none"});
    		}else{
    			$('.error1').css({display:"block"});
    			return;
    		}

    		if ($('#login').val() == "" && $('#pass').val() == "" || $('#login').val() == "" || $('#pass').val() == "" ) {
    			$('.error').css({display:"none"});
    			return;
    		}



            var arrayLogin = Array();	       
	        arrayLogin.push("l=" + $("#login").val())
	        arrayLogin.push("s=" + $("#pass").val())
	        $.ajax({
	            type: "POST",
	            url: "app/login.php",	
	            data: arrayLogin.join("&"),	                      
	            success: function (r) {		          	
		          	if(r === "LogOK"){
			          	var url = "app/";    
						$(location).attr('href',url);
						$('#loading').css({display:"none"});	
		          	}else{
		          		$('.error').css({display:"block"});
		          	}	          		                                
	            },
	            beforeSend: function(){
                    $('#loading').css({display:"block"});
                },
                complete: function(msg){                   
                 $('#loading').css({display:"none"});   
                }
	        });
	    }

	    $('.close').click(function(){

	    	$('.error').css({display:"none"});
	    	$('.error1').css({display:"none"});
	    	$('#login').css('border-color', '#B0B0B0');
	    	$('#pass').css('border-color', '#B0B0B0');	    	
	    });

	    // Rolagem ao topo
		$(document).ready(function() {
			$("#BtnVoltarTopo").hide();

			$(function () {
				$(window).scroll(function () {
					if ($(this).scrollTop() > 600) {
						$('#BtnVoltarTopo').fadeIn();

					} else {
						$('#BtnVoltarTopo').fadeOut();

					}
				});
				$('#BtnVoltarTopo').click(function() {
				$('body,html').animate({scrollTop:0},2000);

				}); 
		    });
		});

		function experimente(){		

			email = $("#cadastreGratis").val();
			var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			imageUrl = "img/loading.gif";
			
			if( $('#cadastreGratis').val() == "" ){

				$('#cadastreGratis').focus();
				$('#cadastreGratis').css("outline-color","#FF0000");

			}else{
				if ( filtro.test( $('#cadastreGratis').val() ) ){					
					$.ajax({
						type: "POST",
						data: {op:"insert", email:email},
						url: "start.php",
						dataType: "html",
						success: function(){							
							$('#texto').slideDown("slow");
						},
						beforeSend: function(){							
							$('#cadastreGratis').css('background-image', 'url(' + imageUrl + ')');
						},
						complete: function(){
							$('#cadastreGratis').css('background-image', 'url()');	
						},
						error: function(){
							alert("Aconteceu algum problema, tente atualizar a página!");
						}
		 			});	
				}else{

					$('#cadastreGratis').focus();
					$('#cadastreGratis').css("outline-color","#FF0000");

				}
			}			
		}

		function comente(){
			$.ajax({
				type: "POST",
				data: {op:"update", comentario:$('#comentarioText').val()},
				url: "start.php",
				dataType: "html",
				success: function(){
					$('#imgLoad').css("display","none");
					$('#botaoverde').css("background-color","yellowgreen");
					$('#botaoverde').css("cursor","default");
					$('#botaoverde').html("");
					$('#botaoverde').html("Comentário cadastrado");
					$('#botaoverde').click(function(){
						$(this).attr("onclick","#");
						$('#imgLoad').css("display","none");
					});
					$('#fecharCad').css("display","block");
					$('#fecharCad').click(function(){						
						$('#texto').slideUp("slow");													
					});
				},					
				beforeSend: function(){
					$('#imgLoad').css("display","block");
				},								
				error: function(){
					alert("Aconteceu algum problema, tente atualizar a página!");
				}
 			});	
		}

			var nav = $('#topoFixed');
	        $(window).scroll(function () {
		        if ($(this).scrollTop() > 700) {	                	               
		        //nav.addClass("fixo");
		        $('.fixo').slideDown(200);
		        } else {	                  
		        //nav.removeClass("fixo");
		        $('.fixo').slideUp(200);
		        }
	        });

	        var nav = $('#experimenteEmail');
	        $(window).scroll(function () {
		        if ($(this).scrollTop() > 200) {
		         $("#experimenteEmail").animate({width:'900px'}, 500);
		        } /*else {
		         $("#experimenteEmail").animate({width:'900px'}, 500);
		        }*/
	        });
	        $('#emailCadastreSe').focus(function(){
	        	$("#experimenteEmail").animate({width:'1000px'}, 500);
	        });
	        $('#emailCadastreSe').focusout(function(){
	        	$("#experimenteEmail").animate({width:'900px'}, 500);
	        });
		

		 $('.bgParallax').each(function(){
			var $obj = $(this);
		 
			$(window).scroll(function() {
				var yPos = -($(window).scrollTop() / $obj.data('speed')); 
		 
				var bgpos = '60% '+ yPos + 'px';
		 
				$obj.css('background-position', bgpos );
		 
			}); 
		});

		/*$('#experimenteEmail input').focusout(function(){
			//$(this).css("width","1000px");
			$(this).animate({"width":"-50px" }, "slow" );
		});	*/	
</script>
