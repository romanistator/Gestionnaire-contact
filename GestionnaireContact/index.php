<?php
    require_once "fonction.php";
    require_once "partials/header.php";
?>

    <main class = "container mt-5">
        <section class = " row">
                <h1>Liste membres</h1>
            <?php 
            $list_membres =getAllMembers(); 
            
            foreach($list_membres as $membre){
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
                        <h5 class="card-title"><?php echo $birthday ;?></h5>
                        <p class="card-text"><?php echo "genre : ".$genre; ?></p>
                        <a class ="roleLink" href = "stagiaires.php?id= <?php echo $membre["role_id"]; ?>"><?php echo $role["nom_role"]."<br>"; ?></a>
                        <?php foreach($hobbies as $i1){
                                ?><a href = "hobbies.php?id=<?php  echo $i1['id_hoobie']?>"><?php echo $i1['nom_hobbie']."<br>"?></a>
                                <?php } ?>
                        
                        <a class="detailsLink" href ="detail.php?id= <?php echo $membre["id_membre"] ?>">Détails</a>
                        <a class="detailsLink" href ="modif.php?id= <?php echo $membre["id_membre"] ?>">Modifier</a>
                    </div>
                </article>
            <?php
            }
            ?>
            
        </section>
        <section>
            <a id="btnAjoutMembre" href = "ajout.php">Ajout contact</a>
        </section>
        
    </main>
 <?php require_once "partials/footer.php"?>