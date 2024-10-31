<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
       <h1>Formulaire d'enregistrement</h1>
       <label for="nom">Last Name</label>
       <input type="text" name="nom" placeholder="Last Name"><br><br>
       <label for="prenom">First Name</label>
       <input type="text" name="prenom" placeholder="First Name"><br><br>
       <label for="email">Email</label>
       <input type="email" name="email" placeholder="Email"><br><br>
       <label for="password">Password</label>
       <input type="password" name="password" placeholder="Password"><br><br>
       <button type="submit">Envoyer</button>
</form>
<?php
        if(isset($_POST['nom'])){
            echo "Le nom de l'utilisateur est : ".$_POST['nom'];
            echo"<br>";
            echo "Le prenom de l'utilisateur est : ".$_POST['prenom'];
            echo"<br>";
            
            insertBD($_POST['nom'],$_POST['prenom'], $_POST['email'], $_POST['password']);
            echo "vous avez créer votre compte";
            header('Location:login.php');
            exit();
    
        }
        else
        {
            echo "Aucune donnée recue ";
        }
        function insertBD($nom,$prenom,$email,$passwd){
            try
            {
                $connect=mysqli_connect('localhost','root','','COMMERCE2');
                echo "connexion réussie <br>";
                mysqli_query($connect,"INSERT INTO CLIENT(nom,prenom,email,motdepasse) values('$nom','$prenom','$email','$passwd')");

                            }
            catch(Exception $e)
            {
                echo "il n'y a une erreur dans le code de ma connexion";
            }
        }  

?>
</body>
</html>