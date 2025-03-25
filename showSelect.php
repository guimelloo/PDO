<?php
require_once "db.php";

$sql = "SELECT * FROM producten";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Product Lijst</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Naam</th>
                    <th>Prijs</th>
                    <th>Omschrijving</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['product_code']) ?></td>
                        <td><?= htmlspecialchars($row['product_naam']) ?></td>
                        <td><?= htmlspecialchars($row['prijs_per_stuk']) ?></td>
                        <td><?= htmlspecialchars($row['omschrijving']) ?></td>
                        <td>
                            <a href="showEdit.php?product_code=<?= $row['product_code'] ?>" class="btn btn-primary btn-sm">Editar</a>
                            <form action="delete.php" method="POST" style="display:inline;">
                                <input type="hidden" name="product_code" value="<?= $row['product_code'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar este produto?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
