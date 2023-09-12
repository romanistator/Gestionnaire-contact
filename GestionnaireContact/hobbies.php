<?php
require_once "fonction.php";
require_once "partials/header.php";
if($_GET["id"]){
    $test = $_GET["id"];
}
$list_membre = getMemberByHobbieId($test);
?>
<main class = "container mt-5">
    <section class = "row">
        <?php
        foreach($list_membre as $membre){
            $role = getMemberRoleByMemberId($membre["id_membre"]);
            $hobbies = getHobbiesMembersById($membre["id_membre"]);
            $nom =  $membre["nom_membre"];
            $prenom = $membre["prenom_membre"];
            $birthday = $membre["naissance_membre"];
            $genre = $membre["genre_membre"];
            ?>    
            <article class="card col-2 m-4 px-0 text-center shadow">
                <div class="card-header px-0 <?php if($genre == "F"){
                                                        echo "bg-danger-subtle";
                                                    }
                                                    else{
                                                        echo "bg-info";
                                                    }
                                        ?>">
                    <?php echo $nom." ".$prenom; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $birthday ?></h5>
                    <p class="card-text"><?php echo "genre : ".$genre ?></p>
                    <a href = "stagiaires.php?id= <?php echo $membre["role_id"] ?>"><?php echo $role["nom_role"] ?></a>
                    <p><?php
                        foreach($hobbies as $i){
                            echo $i['nom_hobbie']." ";
                        }
                    ?>
                    </p>
                    <a href ="detail.php?id= <?php echo $membre["id_membre"] ?>">Détails</a>
                </div>
            </article>
        <?php
        }
        ?> 
    </section> 
</main>
<?php require_once "partials/footer.php"?>