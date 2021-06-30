<?php 
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie la méthode
if($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    // On inclut les fichiers de configurations et d'accès aux données
    include_once '../config/Database.php';
    include_once '../models/Associations.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les produits
    $association = new Associations($db);

    // On récupère l'id du produit
    $donnees = json_decode(file_get_contents("php://input"), true);

    if(!empty($donnees['id'])) {

        $association->id = $donnees['id'];

        if($association->supprimer()) {
            // Ici la suppression a fonctionné
            // On envoie le code 200
            http_response_code(200);
            echo json_encode(["message" => "La suppression a été effectuée"]);

        } else {
            // Ici la suppression n'a pas fonctionné
            // On envoie le code 503
            http_response_code(503);
            echo json_encode(["message" => "la suppression n'a pas été effectuée"]);
        }
    }

} else {
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}