<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes-Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .navbar-custom { 
        position: absolute; 
        background: rgba(0, 0, 0, 0.5); 
        overflow: hidden;
        }   
    .navbar-custom .title{
        color:white;  
        font-size:50px;
        font-family: "Montserrat";

    }
    .navbar-custom .navbar-nav .nav-link { 
        font-size:20px;
        color: white;
     }
     .navbar-custom li:hover{
        color: white; 
        text-decoration: underline;
     }
    .container{
        position: absolute;
        top:20%;
        left:10%;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<header class="mb-5">
<div > 
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top"> 
            <a class="navbar-brand title"  href="#">Site Bonne Bouffe</a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> 
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav"> 
                <ul class="navbar-nav">
                     <li class="nav-item"> <a class="nav-link" href="accueil.php">HomePage</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="login.php">Login</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="index.php">Recipes</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="contact.php">Contacts</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="references.php">References</a> </li> 
                </ul> 
            </div> 
        </nav> 
    </div>
</header>

<div class=" mt-5 para ">
<?php
    echo'<div class="container  justify-content-center">';
    echo '<table class="table table-bordered table-hover pt-5">';
    echo '<thead class="table-info">';
    echo '<td>NUMERO</td>';
    echo '<td>NOM</td>';
    echo '<td>INGREDIENT</td>';
    echo '<td>PHOTO</td>';
    echo '<td>DATE INSCRITE</td>';
    echo '</thead>';
    echo '<tbody>';
    try
    {
        $connect=mysqli_connect('localhost','root','','bonnebouffe');
        echo "connexion réussie <br>";
        $requete=mysqli_query($connect,'SELECT * FROM RECETTES');
        $cp=0;
        if(mysqli_num_rows($requete)>0){
            while($row=mysqli_fetch_assoc($requete))
            {
                if($cp==3)
                {
                    break;
                }
                    echo'<tr>'; 
                    echo'<td>'.$row["idrecette"].'</td>';
                    echo'<td>'.$row["nom"].'</td>';
                    echo'<td>'.$row["ingredients"].'</td>';
                    echo'<td><img class="para" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'"></td>';
                    echo'<td>'.$row["dateinscrite"].'</td>';
                    echo'</tr>';
                    $cp++;
                
            }
        }
    }
    catch(Exception $e)
    {
        echo "il n'y a une erreur dans le code de ma connexion";
    }
    echo '</tbody>';
    echo '</table>';
    echo'</div';

?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>