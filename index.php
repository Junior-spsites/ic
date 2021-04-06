<?php
session_start();
require 'config.php';
require 'funcoes.php';

if(empty($_SESSION['prmlogin'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['pmrlogin'];

$sql = $pdo->prepare("SELECT
usuarios.nome,
patentes.nome as p_nome
FROM usuarios
LEFT JOIN patentes ON patentes.id = usuarios.patente
WHERE usuarios.id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

if($sql->rowCount() > 0) {
	$sql = $sql->fetch();
	$nome = $sql['nome'];
    $p_nome = $sql['p_nome'];
} else {
	header("Location: login.php");
	exit;
}

$lista = listar($id, $limite);

?>
<h1>Sistema de Indicação de Clientes</h1>
<h2>Parceiro Logado: <?php echo $nome.' ('.$p_nome.')'; ?></h2>

<a href="cadastro.php">Cadastrar novo usuário</a>

<a href="sair.php">Sair</a>
<hr/>

<h4>Lista de Cadastros</h4>

<?php exibir($lista); ?>
