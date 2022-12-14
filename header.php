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
                    // afficher les liens menus correspondants à la session
                    ?>
                    <div>
                        <?php echo '<a href="index.php"><i class="fa-solid fa-home"></i>Accueil</a>  &nbsp;';?>
                        <?php echo '<a href="profil.php"><i class="fa-solid fa-user"></i>Profil</a>  &nbsp;';?>
                        <?php
                            if($_SESSION['login'] == 'admin'){ // si l'utilisateur est admin il peut accéder à la page admin
                                echo '<a href="admin.php"><i class="fa-solid fa-screwdriver-wrench"></i>Admin</a>  &nbsp;';
                            } ?>
                    </div>
                    <div>
                        <?php echo "Bonjour $user &nbsp;"; // connecté?> 
                    </div>
                    <div>
                        <?php echo '<a href="index.php?deconnexion=true"><button>Déconnexion</button></a>';?>
                    </div>
                    <?php
                } else { ?>
                    <div>
                        <?php echo '<a href="index.php"><i class="fa-solid fa-home"></i>Accueil</a>&nbsp;';?>
                    </div>
                    <div>
                        <?php echo '<a href="connexion.php"><button>Connexion</button></a>';
                        echo '<a href="inscription.php"><button>Inscription</button></a>';
                }   
                        ?>
                    </div>
        </nav> <!-- end nav -->
    </header>