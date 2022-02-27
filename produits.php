<?php
include("db_connect.php");
include("index.php");
$request_method = $_SERVER["REQUEST_METHOD"];
  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["id"]))
      {
        // Récupérer un seul produit
        $id = intval($_GET["id"]);
        getProducts($id);
      }
      else
      {
        // Récupérer tous les produits
        getProducts();
      }
      break;
      case 'POST':
        // Ajouter un produit
        AddProduct();
        break;

        case 'PUT':
            // Modifier un produit
            $id = intval($_GET["id"]);
            updateProduct($id);
            break;
        case 'DELETE':
             // Supprimer un produit
            $id = intval($_GET["id"]);
            deleteProduct($id);
            break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;

  }

  
?>