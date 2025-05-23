<?php
require_once '../config/db_connect.php';
$conn = openDatabaseConnection();
$stmt = $conn->query("SELECT * FROM clients ORDER BY id");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
closeDatabaseConnection($conn);
?>
<!DOCTYPE html>
<html>
<head>
 <title>Liste des Clients</title>
</head>
<body>
 <h1>Liste des Clients</h1>
 <a href="createClient.php">Ajouter un client</a>
 <table border="1" style="width: 60%; min-width: 400px; margin: 0 auto;">
 <tr>
 <th>ID</th>
 <th>Nom</th>
 <th>Téléphone</th>
 <th>E-Mail</th>
 <th>Nombre de personnes</th>
 <th>Actions</th>
 </tr>
 <?php foreach($clients as $client): ?>
 <tr>
 <td><?php echo $client['id']; ?></td>
 <td><?= $client['nom'] ?></td>
 <td><?= $client['telephone'] ?></td>
 <td><?= $client['email']; ?></td>
 <td><?= $client['nombre_personnes'] ?></td>
 
 <td>
 <a href="editClient.php?id=<?= $client['id'] ?>">Modifier</a>
 <a href="deleteClient.php?id=<?= $client['id'] ?>" onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
 </td>
 </tr>
 <?php endforeach; ?>
 </table>
</body>
</html>