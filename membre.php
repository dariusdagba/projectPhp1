<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmSuppression() {
            return confirm("Êtes-vous sûr de vouloir supprimer cette recette ?");
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Member-Page</title>
</head>
<body>
    <div class="container mt-3">
        <div class=" d-flex justify-content-between">  
            <p >Ajouter une recette :</p>
           <form action="" method="get">
                <button name="choix" value="ajout">Ajouter</button>
           </form> 
         </div>
    <?php
        session_start();
        ob_start();
         try
         {
             $connect=mysqli_connect('localhost','root','','bonnebouffe');
             echo "connexion réussie <br>";
             
             $result=10;
             $req=mysqli_query($connect,'SELECT COUNT(*) AS total FROM RECETTES');
             $rows=mysqli_fetch_assoc($req);
             $total_pages = ceil($rows['total'] / $result);

             $page = isset($_GET['page']) ? $_GET['page'] : 1;
             $page_actuel = ($page - 1) * $result;

             $requete=mysqli_query($connect,"SELECT * FROM RECETTES LIMIT $page_actuel,$result");
             echo '<table class="table table-bordered table-hover">';
             echo '<thead class="table-info">';
             echo '<td>NUMERO</td>';
             echo '<td>NOM</td>';
             echo '<td>INGREDIENT</td>';
             echo '<td>PHOTO</td>';
             echo '<td>COUT</td>';
             echo '<td>DATE INSCRITE</td>';
             echo '<td>MODIFICATION</td>';
             echo '<td>SUPPRESSION</td>';
             echo '</thead>';
             echo '<tbody>';
             if(mysqli_num_rows($requete)>0){
                 while($row=mysqli_fetch_assoc($requete))
                 {
                     $idr=verification($_SESSION["loginmemb"],$row["idrecette"]);
                     echo'<tr>'; 
                     echo'<td>'.$row["idrecette"].'</td>';
                     echo'<td>'.$row["nom"].'</td>';
                     echo'<td>'.$row["ingredients"].'</td>';
                     echo'<td><img class="para" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'"></td>';
                     echo'<td>'.$row["cout"].'</td>';
                     echo'<td>'.$row["dateinscrite"].'</td>';
                     if($idr)
                     {
                        echo'<td><form action="modifrecette.php" method="get"><button name="idrecette" value="'.$row["idrecette"].'">Modifier</button></form></td>';
                        echo'<td><form action="" method="post" onsubmit="return confirmSuppression();"><input type="hidden" name="idrecette" value="'.$row["idrecette"].'"><button name="choix" value="supprimer">Supprimer</button></form></td>';   
                     }
                     else
                     {
                        echo'<td><form action="modifrecette.php" method="get"><button disabled name="idrecette" value="'.$row["idrecette"].'">Modifier</button></form></td>';
                        echo'<td><form action="" method="post" onsubmit="return confirmSuppression();"><input type="hidden" name="idrecette" value="'.$row["idrecette"].'"><button disabled name="choix" value="supprimer">Supprimer</button></form></td>';
                     }
                    echo'</tr>';
                       
                 }
             }
            echo '</tbody>';
            echo '</table>'; 
            echo'<div>';
            echo'<nav aria-label="Page navigation example">';
            echo'<ul class="pagination">';
            for ($i = 1; $i <= $total_pages; $i++) 
            { 
                echo'<li class="page-item">'; 
                echo'<a class="page-link" href="membre.php?page='.$i.'">'.$i.'</a>';
                echo'</li>';
            }
            echo'</nav>';
            echo'</div>';
         }
         catch(Exception $e)
         {
             echo "il n'y a une erreur dans le code de ma connexion";
         }
           
    ?>
    <?php
       if (isset($_POST['choix']) && $_POST['choix'] == 'supprimer') {
        if (isset($_COOKIE["logincookie"])) {
            $idrecette = $_POST['idrecette'];
            deleteBD($idrecette);
            echo 'Recette supprimée avec succès';
            header('Location: membre.php');
            exit();
        } else {
            header('Location: login.php');
            exit();
        }
    }
        if(isset($_GET['choix']))
        {
            switch($_GET['choix'])
            {
                case 'ajout':
                    if(isset($_COOKIE["logincookie"])) {
                        header('Location:ajoutrecette.php');
                    } else {
                        header('Location:login.php');
                    }
                break;
            }

        }
        function deleteBD($idrecette) {
            try {
                $connect = mysqli_connect('localhost', 'root', '', 'bonnebouffe');
                echo "connexion réussie <br>";
                mysqli_query($connect, "DELETE FROM RECETTES WHERE idrecette=$idrecette");
            } catch (Exception $e) {
                echo "il y a une erreur dans le code de ma connexion";
            }
        }
        function verification($login,$idrecette){
            try
            {
                $connect=mysqli_connect('localhost','root','','bonnebouffe');
                $req=mysqli_query($connect,"SELECT  MEMBRES.idmembre, RECETTES.idrecette, RECETTES.idmembre FROM MEMBRES JOIN RECETTES ON MEMBRES.idmembre=RECETTES.idmembre WHERE login='$login'AND RECETTES.idrecette=$idrecette");
                return mysqli_num_rows($req)>0;
            }
            catch(Exception $e)
            {
                echo "login  ou mot de passe incorrect !";
            }
        }
        ob_end_flush();
    ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>