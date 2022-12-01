                                        <!--DBCONNECT BLOC-->
<?php // connexion à la base de données
        $conn = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
        if(!$conn) {
            echo "Connexion non établie.";
            exit;
        }
?>
