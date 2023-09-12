<?php
require_once "fonction.php";
require_once "partials/header.php";
?>

<?php
if($_GET["id"]){
    $test = $_GET["id"];
}
$membre = getMemberById($test);
$role = getMemberRoleByMemberId($test);
$hobbies = getHobbiesMembersById($test);
?>
<main class = "container">
    <section class = "row">
        <article class="card col-9 m-4 px-0 text-center shadow">
            <div class="card-header px-0 <?php if($membre["genre_membre"] == "F"){
                                                    echo "bg-danger-subtle";
                                                }
                                                else{
                                                    echo "bg-info";
                                                }
                                    ?>">
                <?php echo $membre["prenom_membre"]." ".$membre["nom_membre"]; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $membre["naissance_membre"] ?></h5>
                <p class="card-text"><?php echo "genre : ".$membre["genre_membre"] ?></p>
                <p><?php echo $role["nom_role"] ?></p>
                <p><?php
                    foreach($hobbies as $i){
                        echo $i['nom_hobbie']." ";
                    }
                ?>
                </p>
            </div>
        </article>
                </section>
</main>
</body>
</html>


