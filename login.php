<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login-Page</title>
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
     
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div > 
        <nav class="navbar navbar-expand-lg navbar-custom fixed-top"> 
            <a class="navbar-brand title"  href="#">Site Bonne Bouffe</a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> 
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav"> 
                <ul class="navbar-nav ">
                     <li class="nav-item"> <a class="nav-link" href="accueil.php">HomePage</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="login.php">Login</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="index.php">Recipes</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="contact.php">Contacts</a> </li> 
                     <li class="nav-item"> <a class="nav-link" href="references.php">References</a> </li> 
                    </ul>
                </ul> 
            </div> 
        </nav> 


<div class="container">
    <div class="form-wrapper">
        <form action="" method="POST">
            <h1>Membre</h1>
            <label for="login">Last Name</label>
            <input type="text" name="loginmemb" placeholder="login"><br><br>
            <label for="password">Password</label>
            <input type="password" name="passwordmemb" placeholder="Password"><br><br>
            <button type="submit">Entrer</button> <a href="register.php">Non membre</a>
        </form>
    </div>
    <div class="form-wrapper">
        <form action="" method="POST">
            <h1>Administrateur</h1>
            <label for="login">Last Name</label>
            <input type="text" name="loginAdmin" placeholder="login"><br><br>
            <label for="password">Password</label>
            <input type="password" name="passwordAdmin" placeholder="Password"><br><br>
            <button type="submit">Entrer</button> 
        </form>
    </div>
</div>
    <?php
        session_start();
        if(isset($_POST['loginmemb']) && isset($_POST['passwordmemb']))
        {
            $_SESSION['loginmemb']=$_POST['loginmemb'];
            $_SESSION['passwordmemb']=$_POST['passwordmemb'];
            echo "Le login de l'utilisateur est : ".$_POST['loginmemb'];
            echo"<br>";
            echo "Le prelogin de l'utilisateur est : ".$_POST['passwordmemb'];
            echo"<br>";
            loginBDD($_POST['loginmemb'],$_POST['passwordmemb']);

            
    
        }
        else
        {
            //echo "Aucune donnée recue <br>";
        }
        
        function loginBDD($login,$passwd){
            try
            {
                $connect=mysqli_connect('localhost','root','','bonnebouffe');
                echo "connexion réussie <br>";
                $req=mysqli_query($connect,"SELECT * FROM MEMBRES WHERE login='$login' AND password='$passwd'");
                if(mysqli_num_rows($req)>0)
                {
                    echo "vous êtes connecté";
                    
                    setcookie("logincookie", $login, time() + 120, "/");
                    header('Location:membre.php');
                    exit();
                }
                else
                {
                    echo "login ou mot de passe erroné";
                    header('Location:register.php');
                    exit();
                }

            }
            catch(Exception $e)
            {
                echo "login  ou mot de passe incorrect !";
            }
        }
       
    ?>
    <?php
        if(isset($_POST['loginAdmin']) && isset($_POST['passwordAdmin']))
        {
            $_SESSION['loginAdmin']=$_POST['loginAdmin'];
            $_SESSION['passwordAdmin']=$_POST['passwordAdmin'];
            echo "Le login de l'utilisateur est : ".$_POST['loginAdmin'];
            echo"<br>";
            echo "Le prelogin de l'utilisateur est : ".$_POST['passwordAdmin'];
            echo"<br>";
            loginBD($_POST['loginAdmin'],$_POST['passwordAdmin']);

            
    
        }
        else
        {
           // echo "Aucune donnée recue ";
        }
        
        function loginBD($login,$passwd){
            try
            {
                $connect=mysqli_connect('localhost','root','','bonnebouffe');
                echo "connexion réussie <br>";
                $req=mysqli_query($connect,"SELECT * FROM ADMIN WHERE login='$login' AND password='$passwd'");
                if(mysqli_num_rows($req)>0)
                {
                    echo "vous êtes connecté";
                    header('Location:admin.php');
                    exit();
                }
                else
                {
                    echo "login ou mot de passe erroné";
                    header('Location:register.php');
                    exit();
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