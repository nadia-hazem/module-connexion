<!--ADMIN PAGE-->

<?php include 'header.php'; ?>
<?php include 'dbconnect.php'; ?> <!-- connecxion à la base de données -->
<?php // pour sécuriser la page admin à partir de la base d'adresse       
    if (!$_SESSION ['loginOK']) {  // si la session n'est pas ouverte
        header('Location: connexion.php');
    }else if ($user != 'admin') { // si l'utilisateur n'est pas admin
        header('Location: index.php');
    }
?>
<?php $request = $conn->query("SELECT * from `utilisateurs`;");?> <!-- requête pour récupérer les données de la table utilisateurs -->

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