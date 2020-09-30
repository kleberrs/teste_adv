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
		<title>CRUD - Editar</title>		
	</head>
	<body>
		<a href="cadastrar_aluno.php">Cadastrar</a><br>
		<a href="Listar_aluno.php">Listar</a><br>
		<h1>Editar Usuário</h1>

<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
?>

		<form method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="id_aluno" value="<?php echo $row_usuario['id_aluno']; ?>"> <br>

			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br>
			<label>Data Nascimento: </label>
			<input type="date" name="Dt_Nasc" placeholder="Digite Data de Nascimento" value="<?php echo $row_usuario['Dt_Nasc']; ?>">
			<br>

			<br>
			
			<input type="submit" value="Alterar">
		</form>
	</body>
</html>