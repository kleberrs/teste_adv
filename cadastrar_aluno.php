<?php 
session_start();
include_once("conexao_bd.php");

?>

<!DOCTYPE html>

<html lang="pt-br"> 
	<head> 
		<meta charset="utf-8">
		<title>  Matricula       </title>
	</head>
		<body>
			<a href="Listar_aluno.php">Listar</a><br>
			<h1> Cadastrar Aluno   </h1>
			<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];	
				unset($_SESSION['msg']);
		     }
			?>	

			<form method="POST"  action="Processa.php">
				<lebel>  Nome</lebel>
				<input type="text" name="nome" placeholder="Digite o seu nome "> <br><br> 

				<lebel>  Email</lebel>
				<input type="email" name="email" placeholder="Digite o seu  E-mail"> <br><br> 

				<lebel>  D/N </lebel>
				<input id="date" type="date" name="Dt_Nasc" placeholder="Digite DD/MM/AA de Nascimento"> <br><br> 

				<input type="submit" value="Cadastrar">

			<br>	

			</form>

		</body>

</html>