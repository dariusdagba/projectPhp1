<?php
$conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
<?php
$results_per_page = 10; // Nombre de résultats par page

// Récupérer le nombre total de résultats
$sql = "SELECT COUNT(*) AS total FROM votre_table";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row['total'] / $results_per_page);
?>

<?php
// Déterminer la page actuelle
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $results_per_page;

// Récupérer les résultats pour la page actuelle
$sql = "SELECT * FROM votre_table LIMIT $start_from, $results_per_page";
$result = $conn->query($sql);
?>
<div>
    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
        <a href="votre_page.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php } ?>
</div>
