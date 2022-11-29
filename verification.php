<?php
    include 'dbconnect.php';  // connexion à la base de données
    session_start();
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            // pour éliminer toute attaque de type injection SQL et XSS
            $login = mysqli_real_escape_string($conn,htmlspecialchars($_POST['login'])); 
            $password = mysqli_real_escape_string($conn,htmlspecialchars($_POST['password']));

            if($login !== "" && $password !== "")
            {
            $requete = "SELECT count(*) FROM utilisateurs where 
            login = '".$login."' ";
            $exec_requete = mysqli_query($conn,$requete);
            $reponse = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            
                if($count!=0) // nom d'utilisateur correct
                {
                    $requete = "SELECT password FROM utilisateurs where login = '".$login."' ";
                    $exec_requete = mysqli_query($conn,$requete);
                    $reponse = mysqli_fetch_array($exec_requete);
                    $passwordbdd = $reponse['password'];
                    if(password_verify($password, $passwordbdd)){ // password connection contre password base de données
                        $_SESSION['login'] = $login;
                        $requete = "SELECT * FROM utilisateurs where login = '".$login."' ";
                        $exec_requete = mysqli_query($conn,$requete);
                        $reponse = mysqli_fetch_array($exec_requete);
                        $_SESSION['nom'] = $reponse['nom'];
                        $_SESSION['prenom'] = $reponse['prenom'];
                        $_SESSION['password'] = $reponse['password'];

                        header('Location: profil.php');
                    }
                }
        else
        {
            header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
        }
        else
        {
            header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
        }
        }
        else
        {
            header('Location: connexion.php');
        }
    mysqli_close($conn); // fermer la connexion
?>
