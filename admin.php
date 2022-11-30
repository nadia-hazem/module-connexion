<!--ADMIN PAGE-->
<?php
include 'header.php';
include 'dbconnect.php';
$request = $conn->query("SELECT * from `utilisateurs`;");

?>

<main>

    <h2>Bonjour Admin, voilà l’ensemble des informations des utilisateurs présents dans la base de
    données 'moduleconnexion'</h2>
            <table>
                <thead>
                    <tr>
                        <th>login</th>
                        <th>nom</th>
                        <th>prenom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        while(($resultat = $request->fetch_assoc()) != null){
                            echo "<tr>";
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