<?php 
require_once "fonction.php";
require_once "partials/header.php";
if($_GET["id"]){
    $test = $_GET["id"];
}
$membre = getMemberById($test);
$roles = getRoles();
$list_hobbies = getHobbies();
$hobbiesDejaPresent = getOnlyIdHobbiesByMemberId($test);
//$hobbies = $hobbiesDejaPresent["id_hoobie"];

var_dump($hobbiesDejaPresent);
echo "<br>";

if(isset($_POST) && !empty($_POST)){
    $newLastName = $_POST["nom"];
    $newFirstName = $_POST["prenom"];
    $newRole = $_POST["role_id"];
    $newHobbie = $_POST["hobbie"];
    //addHobbieByMembre($newHobbie,$test); 
    var_dump($newHobbie);  
} ?>


<main class = "container mt-5">
        <section class="row">
            <form class = "col-9"  action="" method="POST">
                <fieldset>
                    <legend>Modifier Contact</legend>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom</label>
                        <input type="text" id="lastname" name="nom" class="form-control" value=<?= $membre["nom_membre"];?>>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input type="text" id="firstname" name="prenom" class="form-control" value=<?= $membre["prenom_membre"];?>>
                    </div>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Role</label>
                        <select id="role_id" name="role_id" class="form-select">
                            <?php foreach($roles as $role){?>
                                    <option value="<?= $role["id_role"]?>"><?= $role["nom_role"]?></option>
                            <?php
                            }?>  
                        </select>
                        <section >
                            <label for="hobbie_id" class="form-label mt-4">Ajouter/Supprimer Hobbie :</label>
                            <section>
                                <?php foreach($list_hobbies as $hobbie){?>
                                    <label for="<?= $hobbie["id_hoobie"]?>" class="form-label"><?= $hobbie["nom_hobbie"]?></label>
                                    <?php foreach($hobbiesDejaPresent as $checkedHobbie){
                                        var_dump($checkedHobbie);
                                        if($checkedHobbie['id_hoobie'] != $hobbie['id_hoobie']){ ?>
                                            <input type = "checkbox" id = "<?= $hobbie["id_hoobie"]?>" value =" <?= $hobbie["id_hoobie"] ?>" name = "hobbie[]"><br>
                                        <?php } else { ?>
                                            <input checked type = "checkbox" id = "<?= $hobbie["id_hoobie"]?>" value =" <?= $hobbie["id_hoobie"] ?>" name = "hobbie[]"><br>
                                        <?php } ?>
                                    <?php } ?>  
                                <?php } ?>
                                       
                            </section>
                        </section>
                    </div>
                    <button type="submit" value="ajouter" class="btn btn-primary">VALIDER</button>
                </fieldset>
            </form>
        </section>
    </main>
    <?php require_once "partials/footer.php";?>