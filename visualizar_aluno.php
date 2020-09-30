<?php
session_start();
include_once("conexao_bd.php");
			$id_aluno = filter_input(INPUT_GET, 'id_aluno', FILTER_SANITIZE_NUMBER_INT);
			$result_usuario = "SELECT * FROM cad_aluno WHERE id_aluno = '$id_aluno'";
			$resultado_usuario = mysqli_query($con, $result_usuario);
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - VISUALIZAR r</title>		
	</head>
	<body>
		<a href="cadastrar_aluno.php">Cadastrar</a><br>
		<a href="Listar_aluno.php">Listar</a><br>
			<h1>Visualizar Usuário</h1>
		<?php

		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<?php
	//declaração de variáveis
			$id_aluno = filter_input(INPUT_POST, 'id_aluno', FILTER_SANITIZE_NUMBER_INT) ;
			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING) ;
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ;
			$Dt_Nasc = filter_input(INPUT_POST, 'Dt_Nasc', FILTER_SANITIZE_STRING) ;

	//seleciona a tabela através do nome
			$query = "SELECT * FROM cad_aluno WHERE id_aluno = '$id_aluno'";
	
	
			$dados = mysqli_query($con,$result_usuario);
	//procura os dados no banco
		if ($linha=mysqli_fetch_array($dados)){
			echo"Matricula: " . $linha ["id_aluno"]."<br>";
			echo"Nome: " . $linha ["nome"]."<br>";
			echo "Email.: " 	. $linha["email"]. "<br>";
			echo "Data Nascimento: " 		. $linha["Dt_Nasc"] 	. "<br>";
			echo "<a href='editar_aluno.php?id_aluno=" . $row_usuario['id_aluno'] . "'>Editar</a><br><hr>";
		 }
	else
		{
			echo "Nenhum usuário encontrado com esse nome";
		
		}
	mysqli_close($con);
?>


	</body>
</html>