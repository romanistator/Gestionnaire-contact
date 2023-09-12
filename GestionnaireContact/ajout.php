<?php
require_once "fonction.php";
require_once "partials/header.php";
$roles = getRoles();
if(isset($_POST) && !empty($_POST)){
    $lastname = $_POST["nom"];
    $firstname = $_POST["prenom"];
    $birthdate = $_POST["birthdate"];
    $genre = $_POST["sexe"];
    $role = $_POST["role_id"];
    addMember($lastname, $firstname, $birthdate, $genre, $role);
    
} ?>
<body>
    <main class = "container mt-5">
        <section class="row">
            <form class = "col-9"  action="" method="POST">
                <fieldset>
                    <legend>Ajouter un contact</legend>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">NOM</label>
                        <input type="text" id="lastname" name="nom" class="form-control" placeholder="NOM">
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">PRENOM</label>
                        <input type="text" id="firstname" name="prenom" class="form-control" placeholder="PRENOM">
                    </div>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">DATE DE NAISSANCE</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control">
                    </div>
                    <div class="mb-3">
                    <label for="role_id" class="form-label">ROLE</label>
                    <select id="role_id" name="role_id" class="form-select">
                    <?php foreach($roles as $role){?>
                            <option value="<?= $role["id_role"]?>"><?= $role["nom_role"]?></option>
                        <?php
                        }?>  
                    </select>
                    </div>
                    <div class="mb-3">
                    <label for="sexe" class="form-label">SEXE</label>
                    <select id="sexe" name="sexe" class="form-select">
                        <option value ="M">M</option>
                        <option value = "F">F</option>
                    </select>
                    </div>
                    <section >
                            <label for="hobbie_id" class="form-label mt-4">Ajouter/Supprimer Hobbie :</label>
                            <?php foreach($list_hobbies as $hobbie){?>
                                <section>
                                    <label for="<?= $hobbie["id_hoobie"]?>" class="form-label"><?= $hobbie["nom_hobbie"]?></label>
                                    <input type = "checkbox" id = "<?= $hobbie["id_hoobie"]?>" value =" <?= $hobbie["id_hoobie"] ?>" name = "hobbie[]"><br>       
                                </section>
                            <?php
                            }
                            ?>
                        </section>
                    <button type="submit" value="ajouter" class="btn btn-primary">VALIDER</button>
                </fieldset>
            </form>
        </section>
    </main>
</body>
</html>