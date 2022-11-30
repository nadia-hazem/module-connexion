                                        <!--DBCONNECT BLOC-->
<?php
        $conn = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
        if(!$conn) {
            echo "Connexion non établie.";
            exit;
        }
?>
