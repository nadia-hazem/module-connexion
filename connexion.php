<!--CONNEXION PAGE-->
<?php include 'header.php';?>
<?php include 'dbconnect.php';?> <!-- connecxion à la base de données -->

<main>
    <div class="row">
        <div class="col flex2">
            <h1>Bonjour</h1>
            <h2>Connectez-vous pour accéder à votre profil</h2>
        </div>
        <div class="col flex2">
            <div class="module">
                <form action="verification.php" method="POST"> <!-- redirection vers la page de vérification -->
                    <h1>Connexion</h1>
                    <label>Nom d'utilisateur</label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

                    <label>Mot de passe</label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                    <input type="submit" id='submit' value='Connexion' >

                    <?php

                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2)
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    
                    ?>
                </form>
            </div> <!-- /module -->
        </div> <!-- /col -->
    </div>
</main>

<?php include 'footer.php';?>
