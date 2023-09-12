<?php
function dbConnect(){
    try {
        //on place les données dans une variable qui est un objet
        $dbh = new PDO("mysql:host=localhost;dbname=exosql", "root","");// premier parametre("driver base dde donnée:adresse serveur;
                                                                        // puis le nom de la base de donnée, le "nom user","mot de passe")
        return $dbh;
        } catch (PDOException $e) {//si il n'arrive pas à se connecter faire:
        echo "ca ne marche pas";
    }
}

function getAllMembers(){
    $connect = dbConnect();
    $membres = $connect -> query("SELECT * FROM membres");// on récupére la requête dans une variable
    $list_membres = $membres -> fetchAll(PDO::FETCH_ASSOC);//on traduit la requête dans une variable grace à fetchAll(car plusieurs éléments)
                                                         //avec la methode(PDO :: FETCH_ASSOC) pour n'avoir q'un tableau associatif
                                                         //car si les parenthéses de fetchAll sont vide il renvoi 2 tableaux.
    return $list_membres;
}

function getMemberRoleByMemberId($id){
    $connect = dbConnect();
    $stmt = $connect -> query("SELECT nom_role FROM roles JOIN membres ON roles.id_role = membres.role_id WHERE membres.id_membre = $id");
    $role = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $role;
}

function getHobbiesMembersById($id){
    $connect = dbConnect();
    $stmt = $connect -> query("SELECT nom_hobbie, id_hoobie FROM hobbies JOIN hobbies_membres ON hobbies.id_hoobie = hobbies_membres.hobbie_id JOIN membres ON hobbies_membres.membre_id = membres.id_membre WHERE membres.id_membre = $id" );
    $hobbies = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $hobbies;
}
function getOnlyIdHobbiesByMemberId($id){
    $connect = dbConnect();
    $stmt = $connect -> query("SELECT id_hoobie FROM hobbies JOIN hobbies_membres ON hobbies.id_hoobie = hobbies_membres.hobbie_id JOIN membres ON hobbies_membres.membre_id = membres.id_membre WHERE membres.id_membre = $id" );
    $hobbies = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $hobbies;
}

function getMemberById($id){
    $connect = dbConnect();
    $membre = $connect -> query("SELECT nom_membre, prenom_membre,naissance_membre,genre_membre FROM membres WHERE id_membre = $id");
    $nom = $membre -> fetch(PDO::FETCH_ASSOC);
    return $nom;
}

function trieAgeCroissant(){
   $connect = dbConnect();
   $stmt = $connect -> query("SELECT * FROM membres ORDER BY membres.naissance_membre DESC");
   $list_ages = $stmt -> fetchAll(PDO::FETCH_ASSOC);
   return $list_ages;
}
function getMembreByRoleId($id){
    $connect = dbConnect();
    $stmt = $connect -> query("SELECT * FROM membres WHERE membres.role_id = $id");
    $stagiaires = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $stagiaires;
}

function getMemberByHobbieId($id){
    $connect = dbconnect();
    $stmt = $connect -> query("SELECT * FROM membres JOIN hobbies_membres ON membres.id_membre = hobbies_membres.membre_id JOIN hobbies ON hobbies_membres.hobbie_id = hobbies.id_hoobie WHERE hobbies_membres.hobbie_id = $id");
    $list_membre = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list_membre;
}

function getRoles(){
    $connect = dbConnect();
    $stmt = $connect -> query("SELECT * FROM roles");
    $list_roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list_roles;
}

function getHobbies(){
    $connect = dbConnect();
    $stmt = $connect->query("SELECT * FROM hobbies");
    $list_hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $list_hobbies;
}

function addMember($lastname, $firstname, $birthdate, $genre, $role){
    $connect = dbConnect();
    $stmt = $connect->query("INSERT INTO membres VALUES(null, '$lastname', '$firstname', '$birthdate', '$genre', '$role')");
}

function addHobbieByMembre($newHobbie, $membreId){
    $connect = dbConnect();
    $stmt = $connect->query("INSERT TO hobbies_membres VALUES('$newHobbie','$membreId')");
}

//var_dump($list_membres);
//$hobbies = $dbh -> query("SELECT * FROM hobbies");
//$list_hobbies = $hobbies -> fetchAll(PDO::FETCH_ASSOC);
//var_dump($list_hobbies);
//$hobbies_membres = $dbh -> query("SELECT hobbie_id FROM hobbies_membres");
//$list_hobbies_membres = $hobbies_membres -> fetchAll(PDO::FETCH_ASSOC);
//var_dump($list_hobbies_membres); 
