<?php
require_once ('conf/conexao.class.php');

if(isset($_POST["l"]) AND !empty($_POST["l"])){
	$login = $_POST["l"];	
}

if(isset($_POST["s"]) AND !empty($_POST["s"])){
	$senha = $_POST["s"];
}

$query = "SELECT * 
		FROM tb_usuario 
		WHERE email='{$login}'
		AND senha='{$senha}'		    	
		 ";	 

$GLOBALS['db']->execute($query);
$result = $GLOBALS['db']->fetchAll();

if(empty($result)){
		echo "LoginNONE";
}else{

	foreach ($result as $key) {
		
		 if($key["email"] == $login && $key["senha"] == $senha){
			
			echo "LogOK";			
			session_start();
			$_SESSION["nome"] = $key["nome"];
			$_SESSION["email"] = $key["email"];
			$_SESSION["id_Empresa"] = $key["empresa"];

		}else{
			echo "LoginNONE";
		}

	}

}


    
    

?>