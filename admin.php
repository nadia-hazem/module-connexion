<!--ADMIN PAGE-->

<?php include 'header.php'; ?>
<?php include 'dbconnect.php'; ?>
<?php                 
    if (!$_SESSION ['loginOK']) {
        header('Location: connexion.php');
    }else if ($user != 'admin') {
        header('Location: index.php');
    }
?>
<?php $request = $conn->query("SELECT * from `utilisateurs`;");?>

<main>

    <h3>Bonjour Admin, voilà l’ensemble des informations des utilisateurs présents dans la base de
    données 'moduleconnexion'</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>LOGIN</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        while(($resultat = $request->fetch_assoc()) != null){
                            echo "<tr>";
                            echo "<td>".$resultat['id']."</td>";
                            echo "<td>".$resultat["login"]."</td>";
                            echo "<td>".$resultat["nom"]."</td>";
                            echo "<td>".$resultat["prenom"]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>

</main> <!-- /main -->
<?php include 'footer.php'; ?>