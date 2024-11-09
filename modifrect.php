<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modify-Page</title>
</head>
<body>
<div class="container mt-3">
<?php
session_start();
ob_start();
try {
    if (isset($_GET['idrecette'])) {
        $idrecette = $_GET['idrecette'];
        $connect = mysqli_connect('localhost', 'root', '', 'bonnebouffe');
        echo "connexion réussie <br>";
        $requete = mysqli_query($connect, "SELECT * FROM RECETTES WHERE idrecette=$idrecette");
        if (mysqli_num_rows($requete) > 0) {
            while ($row = mysqli_fetch_assoc($requete)) {
                echo '<form action="" method="post" enctype="multipart/form-data">';
                echo '<h1>Modification de la recette</h1>';
                echo '<input type="hidden" name="idrecette" value="' . $idrecette . '">';
                echo '<label for="nom">Nom de la recette</label>';
                echo '<input type="text" name="nom" placeholder="Nom de la recette" value="' . $row["nom"] . '" required><br><br>';
                echo '<label for="ingredient">Ingrédient</label>';
                echo '<input type="text" name="ingredient" placeholder="Ingrédient" required value="' . $row["ingredients"] . '"><br><br>';
                echo '<label for="preparation">Préparation</label>';
                echo '<input type="text" name="preparation" placeholder="préparation" value="' . $row["preparation"] . '" required ><br><br>';
                echo '<label for="cout">Coût</label>';
                echo '<input type="text" name="cout" placeholder="56.00" value="' . $row["cout"] . '"  required><br><br>';
                echo '<label for="date">Date inscrite</label>';
                echo '<input type="date" id="date" name="date" value="' . $row["dateinscrite"] . '"><br><br>';
                echo '<label for="photo">Photo</label>';
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'" width="100" height="100"><br><br>';
                echo '<label for="photo">Photo</label>';
                echo '<input type="file" name="photo" accept="image/*"><br><br>';
                echo '<label for="membre">Membre</label><select name="membre" id="membre">';
                ?>
                <?php
                $connectt=mysqli_connect('localhost','root','','bonnebouffe');
                echo "connexion réussie <br>";
                $req1=mysqli_query($connectt,"SELECT * FROM MEMBRES");
                if(mysqli_num_rows($req1)>0)
                {
                    while($rows=mysqli_fetch_assoc($req1))
                    {
                        echo'<option value="'.$rows["idmembre"].'">'.$rows["login"].'</option>';
                    }        
                    
                }
                ?>
                <?php
                echo '</select><br><br>';
                echo '<label for="nbpers">Nombre de personnes</label>';
                echo '<input type="text" name="nbpers" placeholder="nombre de personnes" value="'. $row["nombrepersonne"] .'" required><br><br>';
                echo '<button type="submit" name="submit">Modifier</button>';
                echo '</form>';
            }
        }
    }
} catch (Exception $e) {
    echo "il y a une erreur dans le code de ma connexion";
}

    if (isset($_POST['submit'])) {
        $idrecette = $_POST['idrecette'];
        $idm =$_POST["membre"];
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
            updateBD($_POST['nom'], $_POST['ingredient'], $_POST['preparation'], $_POST['nbpers'], $_POST['cout'], $_POST['date'], $image, $idm, $idrecette);
            echo "vous avez modifié une recette";
            header('Location:admin.php');
            exit();
        } else {
            updateBDD($_POST['nom'], $_POST['ingredient'], $_POST['preparation'], $_POST['nbpers'], $_POST['cout'], $_POST['date'], $idm, $idrecette);
            echo "vous avez modifié une recette";
            header('Location:admin.php');
            exit();
        }
    }

    function updateBD($nom, $ingredient, $preparation, $nbpers, $cout, $date, $photo, $idm, $idrecette) {
        try {
            $connect = mysqli_connect('localhost', 'root', '', 'bonnebouffe');
            echo "connexion réussie <br>";
            mysqli_query($connect, "UPDATE RECETTES SET nom='$nom', ingredients='$ingredient', preparation='$preparation', nombrepersonne='$nbpers', cout='$cout', dateinscrite='$date', photo='$photo', idmembre='$idm' WHERE idrecette=$idrecette");
        } catch (Exception $e) {
            echo "il n'y a une erreur dans le code de ma connexion <br>";
        }
    }
    function updateBDD($nom, $ingredient, $preparation, $nbpers, $cout, $date, $idm, $idrecette) {
        try {
            $connect = mysqli_connect('localhost', 'root', '', 'bonnebouffe');
            echo "connexion réussie <br>";
            mysqli_query($connect, "UPDATE RECETTES SET nom='$nom', ingredients='$ingredient', preparation='$preparation', nombrepersonne='$nbpers', cout='$cout', dateinscrite='$date', idmembre='$idm' WHERE idrecette=$idrecette");
        } catch (Exception $e) {
            echo "il n'y a une erreur dans le code de ma connexion <br>";
        }
    }
    ob_end_flush();
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
