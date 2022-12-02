                                        <!--DBCONNECT BLOC-->
<?php // connexion à la base de données

/*         $conn = mysqli_connect('localhost', 'root', '', 'moduleconnexion'); */
        $conn = mysqli_connect('localhost', 'nadia', '*moduleconnexion*', 'nadia-hazem_moduleconnexion');

        if(!$conn) {
            echo "Connexion non établie.";
            exit;
        }
?>
