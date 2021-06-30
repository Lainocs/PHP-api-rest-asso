<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'GET') {

    // On inclut les fichiers de configurations et d'accès aux données
    include_once '../config/Database.php';
    include_once '../models/Associations.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $associations = new Associations($db);

    // On récupère les données
    $stmt = $associations->lire();

    // On vérifie si on a au moins une asso
    if($stmt->rowCount() > 0) {

        // On initialise un tableau associatif
        $associationList = [];
        $associationList['associations'] = [];

        // On parcourt les associations
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            
            $asso = [
                "id" => $id,
                "nom" => $nom,
                "logo" => $logo,
                "description" => $description,
                "mail" => $mail,
                "facebook" => $facebook,
                "twitter" => $twitter,
                "instagram" => $instagram,
                "discord" => $discord
            ];

            $associationList['associations'][] = $asso;

        }
        // On envoie le code réponse 200 OK
        http_response_code(200);
        
        // On encode en JSON et on envoie
        echo json_encode($associationList);
    }

} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}