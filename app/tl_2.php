<?php
require_once ('conf/conexao.class.php');
require_once ('conf/controller.php');

session_start();
if(!isset($_SESSION['email']) OR empty($_SESSION['email'])){
	header("location: logout.php");
}
$visu='grd';
if(isset($_SESSION['visu']) && !empty($_SESSION['visu'])){
    $visu='lst';
}
?>
<!DOCTYPE html>
<html>
<head>	
	<link rel="stylesheet" type="text/css" href="styleIrfm.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<link rel="shortcut icon" href="../img/favicon.ico" >
	<title>ValidaCom</title>
</head>
<body>

    




<div id="englobaLista">

    <div id="lista" class="">Lista</div>    
    <div id="grade" class="">Grade</div>

	<?php echo selectPrdtValidade(); ?>	

</div>	


</body>
</html>

<script type="text/javascript">

    $('#lista').click(function(){  
        <?php $_SESSION["visu"] = "listaPrdt"; ?>      
        $(this).addClass("active");
        $('.percorrer').each(function(){ 
            $(this).removeClass("gradePrdt");
            $(this).addClass("listaPrdt");
        });    
    });

    $('#grade').click(function(){
        <?php $_SESSION["visu"] = "gradePrdt"; ?>
        $('.percorrer').each(function(){ 
            $(this).removeClass("listaPrdt");
            $(this).addClass("gradePrdt");
        });
    });

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


    

</script>