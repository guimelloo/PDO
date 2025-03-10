<?php 
require_once "db.php";

$sql = "SELECT * FROM producten";
$stmt = $pdo->query($sql);

echo "<table border='1'>";

echo "<tr>
        <th>Code</th>
        <th>Naam</th>
        <th>Prijs</th>
        <th>Omschrijving</th>
      </tr>";

while ($row = $stmt->fetch()) {
    echo "<tr>
            <td>" . htmlspecialchars($row['product_code']) . "</td>
            <td>" . htmlspecialchars($row['product_naam']) . "</td>
            <td>" . htmlspecialchars($row['prijs_per_stuk']) . "</td>
            <td>" . htmlspecialchars($row['omschrijving']) . "</td>
          </tr>";
}

echo "</table>";

