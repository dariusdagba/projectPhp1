<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div>
        <form action="" method="POST">
            <h1 class="text-primary">Membre</h1>
        <label for="login">Last Name</label>
        <input type="text" name="loginmemb" placeholder="login"><br><br>
        <label for="password">Password</label>
        <input type="password" name="passwordmemb" placeholder="Password"><br><br>
        <button type="submit">Entrer</button> <a href="">Non membre</a>
        </form>
            <br>
        <form action="" method="POST">
            <h1 class="text-primary">Administrateur</h1>
        <label for="login">Last Name</label>
        <input type="text" name="loginAdmin" placeholder="login"><br><br>
        <label for="password">Password</label>
        <input type="password" name="passwordAdmin" placeholder="Password"><br><br>
        <button type="submit">Entrer</button> <a href="">Non membre</a>
        </form>
    </div>
    

    <?php
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            echo "Le login de l'utilisateur est : ".$_POST['login'];
            echo"<br>";
            echo "Le prelogin de l'utilisateur est : ".$_POST['password'];
            echo"<br>";
            loginBD($_POST['login'],$_POST['password']);

            
    
        }
        else
        {
            echo "Aucune donnée recue ";
        }
        
        function loginBD($login,$passwd){
            try
            {
                $connect=mysqli_connect('localhost','root','','COMMERCE2');
                echo "connexion réussie <br>";
                $req=mysqli_query($connect,"SELECT * FROM CLIENT WHERE login='$login' AND motdepasse='$passwd'");
                if(mysqli_num_rows($req)>0)
                {
                    echo "vous êtes connecté";
                    header('Location:welcome.php');
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
    <?php?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>