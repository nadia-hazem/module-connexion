<!--HEADER BLOC-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <script src="https://kit.fontawesome.com/12c357b92c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <title>header</title>
</head>
<body>
    <header>
        <nav>
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
                    ?>
                    <div class="top1">
                        <?php echo '<a href="index.php">Accueil</a>  &nbsp;';?>
                        <?php echo '<a href="profil.php">Profil</a>  &nbsp;';?>
                        <?php
                            if($_SESSION['login'] == 'admin'){
                                echo '<a href="admin.php">Admin</a>  &nbsp;';
                            } ?>
                    </div>
                    <div class="top2">
                        <?php echo "Bonjour $user &nbsp;"; ?>
                    </div>
                    <div class="top3">
                        <?php echo '<a href="index.php?deconnexion=true"><button>Déconnexion</button></a>';?>
                    </div>
                    <?php
                } else { ?>
                    <div class="top1">
                        <?php echo '<a href="index.php"><i class="fa-solid fa-home"></i>Accueil</a>  &nbsp;';?>
                    </div>
                    <div class="top2">
                        <?php echo '<a href="connexion.php"><button>Connexion</button></a>';
                        echo '<a href="inscription.php"><button>Inscription</button></a>';
                }   
                        ?>
                    </div>
        </nav> <!-- end nav -->
    </header>