<?php
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['product_code'];

    $sql = "DELETE FROM producten WHERE product_code = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$id])) {
        header("Location: showSelect.php");
        exit();
    } else {
        $errorInfo = $stmt->errorInfo();
        die("Erro ao excluir o produto: " . $errorInfo[2]);
    }
} else {
    die("Método de requisição inválido.");
}
?>
