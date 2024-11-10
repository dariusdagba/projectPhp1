<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1 {
    text-align: center;
    color: #343a40;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #495057;
}

input[type="text"],
input[type="date"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

        </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add-recipes-page</title>
</head>
<body>
<div class="container mt-3">
    <form action="" method="POST" enctype="multipart/form-data">
        <h1>Formulaire d'ajout de recette</h1>
        <label for="nom">Nom de la recette</label>
        <input type="text" name="nom" placeholder="Nom de la recette" required><br><br>
        <label for="ingredient">Ingrédient</label>
        <input type="text" name="ingredient" placeholder="Ingrédient" required><br><br>
        <label for="preparation">Préparation</label>
        <input type="text" name="preparation" placeholder="préparation" required><br><br>
        <label for="cout">Coût</label>
        <input type="text" name="cout" placeholder="56.00" required><br><br>
        <label for="date">Date inscrite</label> 
        <input type="date" id="date" name="date"><br><br>
        <label for="photo">Photo</label>
        <input type="file" name="photo" accept="image/*" required><br><br>
        <label for="nbpers">Nombre de personnes</label>
        <input type="text" name="nbpers" placeholder="nombre de personnes" required><br><br>
        <button type="submit">Ajouter</button> 
    </form>
</div>

<?php
        session_start();
        if(isset($_POST['nom'])&& isset($_POST['ingredient'])&& isset($_POST['preparation']) && isset($_POST['cout'])&& isset($_POST['date'])&& isset($_POST['nbpers']))
        {
            $idm=verification($_SESSION["loginmemb"]);
            if (is_uploaded_file($_FILES['photo']['tmp_name'])) 
            {
                $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
                insertBD($_POST['nom'],$_POST['ingredient'],$_POST['preparation'], $_POST['nbpers'], $_POST['cout'], $_POST['date'],$image, $idm);
                echo "vous avez ajouté une recette";
                header('Location:membre.php');
                exit();
            }
            
    
        }
        else
        {
            //echo "Aucune donnée recue ";
        }
        function insertBD($nom,$ingredient,$preparation,$nbpers,$cout,$date,$photo,$idm){
            try
            {
                $connect=mysqli_connect('localhost','root','','bonnebouffe');
                echo "connexion réussie <br>";
                mysqli_query($connect,"INSERT INTO RECETTES(nom,ingredients,preparation,nombrepersonne,cout,dateinscrite,photo,idmembre) values('$nom','$ingredient','$preparation','$nbpers','$cout','$date','$photo','$idm')");

            }
            catch(Exception $e)
            {
                echo "il n'y a une erreur dans le code de ma connexion <br>";
            }
        } 
        
        function verification($login){
            try
            {
                $connect=mysqli_connect('localhost','root','','bonnebouffe');
                echo "connexion réussie <br>";
                $req=mysqli_query($connect,"SELECT * FROM MEMBRES WHERE login='$login'");
                if(mysqli_num_rows($req)>0)
                {
                    while($row=mysqli_fetch_assoc($req))
                    {
                        $idm=$row["idmembre"];
                    }
                    return $idm;
                }

            }
            catch(Exception $e)
            {
                echo "login  ou mot de passe incorrect !";
            }
        }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>