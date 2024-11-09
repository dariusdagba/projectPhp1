<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3">
<?php
    echo '<table class="table table-bordered table-hover">';
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

?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>