<?php
require_once('conexao.class.php');

if(isset($_POST["oper"]) AND !empty($_POST["oper"]) AND $_POST["oper"]=="insertPrdt"){	

	$arr_content=$_POST["dadosForm"];
	$tb_insert=$_POST["tb_insert"];
	$empresa=$_POST["empresa"];
	
	$colunas="";
	$valores="";
	foreach ($arr_content as $name => $value) {
		$colunas .=",".$name["name"];
		$valores .=",'".$name["value"]."'"; 		
	}

	$data = json_decode($arr_content);

	$query_verifica = " SELECT codigo, nome
						FROM tb_produto
						WHERE empresa={$_SESSION['id_Empresa']}
						AND (codigo= OR nome=)						
					";
	$GLOBALS['db']->execute($query_verifica);

	if ($GLOBALS['db']->linhasAfetadas() == 0) {
		//insere o produto se não existe outro igual
		$query="INSERT INTO {$tb_insert} 
				(id_Produto,id_Fornecedor{$colunas}, empresa) 
				VALUES ('',''{$valores}, {$empresa})
				";
		$GLOBALS['db']->execute($query);
		
		$id = $GLOBALS['db']->ultimoIdInserido();
		
		echo $id;
		exit;

	}else{
		echo "jext";
		exit;

	}	

}else if(isset($_POST["oper"]) AND !empty($_POST["oper"]) AND $_POST["oper"]=="update"){	
	
	$tb_insert=$_POST["tb_insert"];
	$arr_content=$_POST["conteudo"];
	
	$cons="";

	foreach ($arr_content as $name) {
		$cons .= $name["name"] . "=" . $name["value"].",";
		$set = substr($cons, 0, -1);
	}
		
	$query="UPDATE {$tb_insert} 
				SET {$set}
				WHERE empresa = {$_SESSION['id_Empresa']}
				";
	$GLOBALS['db']->execute($query);
	$result = $GLOBALS['db']->fetchAll();
	
}

function selectPrdt($param_codigo=null, $param_nome=null){
	$query="SELECT *
			FROM tb_produto
	";
	$GLOBALS['db']->execute($query);
	$result = $GLOBALS['db']->fetchAll();	
	$dados ="";
	foreach ($result as $key) {			
		
		$insere=0;
		if ($key["codigo"] !== $param_codigo AND $key["nome"] !== $param_nome) {
			$insere=1;			
		}
		echo $insere;
	}		
}

function selectPrdtValidade(){
	$query="SELECT descricao, 
					DATEDIFF( dt_validade, NOW()) AS tempo_restante_da_validade, 
					DATEDIFF( dt_validade, dt_fabricacao) AS validade_do_produto,
					dt_validade
				FROM tb_produto
				WHERE empresa={$_SESSION['id_Empresa']}
			";
	$queryControle=" SELECT green_prazo, gold_prazo, red_prazo
					FROM tb_controle
					WHERE empresa={$_SESSION['id_Empresa']}
				";

	$GLOBALS['db']->execute($query);
	$result = $GLOBALS['db']->fetchAll();

	$GLOBALS['db']->execute($queryControle);
	$resultControle = $GLOBALS['db']->fetch();

	$dados ="";
	foreach ($result as $key) {

		//var_dump($key["validade_do_produto"]);

		if($key["tempo_restante_da_validade"] > $resultControle["green_prazo"] || $key["tempo_restante_da_validade"] > $resultControle["gold_prazo"]){
			$set_color="vrd";
		}else if ($key["tempo_restante_da_validade"] < $resultControle["green_prazo"] && $key["tempo_restante_da_validade"] > $resultControle["red_prazo"]) {
			$set_color="yllw";
		}else{
			$set_color="vrm";
		}		

		$data = date('d/m/Y', strtotime($key["dt_validade"]));
		$dados .= "
		
		<div id='cointainerPrdt' class='".$set_color." percorrer'>
		
		<div id='molduraImg'> <img src='http://distribuidoraalcance.com/media/bakery/images/item453/coca_cola_3.jpg' border='0' height='100' width='100'> </div>
		
		<div id='texto'>
			<span class='text'>data</span>
			<br>
			<span class='textDesc'>descrição</span>	
		</div>
		
		<div id='dele' class='iconsLista'><i class='fa fa-trash-o'></i></div>
		<div id='edit' class='iconsLista'><i class='fa fa-pencil'></i></div>
		<div id='visu' class='iconsLista'><i class='fa fa-info'></i></div>

		</div><br>

		";		
	}	
	return ($dados);
}
?>
	
	
	
	