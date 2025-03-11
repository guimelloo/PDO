<?php
require_once "db.php";

if (!isset($_GET['product_code'])) {
    die("ID not found.");
}

$id = $_GET['product_code'];

$sql = "SELECT * FROM producten WHERE product_code = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    die("Product not found.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Product Edit</h1>
        <form method="POST" action="edit.php">
            <!-- Campo oculto para enviar o ID do produto -->
            <input type="hidden" name="product_code" value="<?= htmlspecialchars($product['product_code']) ?>">

            <div class="mb-3">
                <label for="naam" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="naam" name="product_naam" value="<?= htmlspecialchars($product['product_naam']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="prijs" class="form-label">Prijs</label>
                <input type="number" step="0.01" class="form-control" id="prijs_per_stuk" name="prijs" value="<?= htmlspecialchars($product['prijs_per_stuk']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="omschrijving" class="form-label">Omschrijving</label>
                <textarea class="form-control" id="omschrijving" name="omschrijving" rows="3" required><?= htmlspecialchars($product['omschrijving']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>