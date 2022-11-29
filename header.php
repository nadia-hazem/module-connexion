<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1920px, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <title>header</title>
</head>
<body>
    <header>
        <nav class="row">
            <div class="col">
                <!-- tester si l'utilisateur est connecté -->
                <?php
                session_start();
                if (isset($_GET['deconnexion'])){
                    if($_GET['deconnexion']==true){
                        session_unset();
                        header('Location: index.php');
                    }
                }
                else if (isset($_SESSION['login'])) {
                    $user = $_SESSION['login'];
                    // afficher un message
                    echo "Bonjour $user, vous êtes connecté(e) ! &nbsp;";       
                    echo '<a href="index.php">Accueil</a>  &nbsp;';
                    echo '<a href="profil.php">Profil</a>  &nbsp;';
                    echo '<a href="index.php?deconnexion=true"><button>Déconnexion</button></a>';
                    if($_SESSION['login'] == 'admin'){
                        echo '<a href="admin.php">Admin</a>  &nbsp;';
                    }
                } else {
                    echo '<a href="index.php">Accueil</a>  &nbsp;';
                    echo '<a href="connexion.php"><button>Connexion</button></a>';
                    echo '<a href="inscription.php"><button>Inscription</button></a>';
                }   
                ?>
            </div> <!-- end col -->
        </nav> <!-- end nav -->
    </header>


