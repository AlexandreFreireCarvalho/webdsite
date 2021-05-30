<?php
namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;



class OrderServices{

    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function createOrder($cart){

    }

    public function saveCart($cart, $user){

    }

    public function generateUuid(){

        // Intialise le générateur de nombres aléatoires Mersenne Twister
        mt_srand((double)microtime()*100000);

        //strtoupper : Renvoie une chaîne en majuscules
        //uniqid : Génère un identifiant unique
        $charid = strtoupper(md5(uniqid(rand(), true)));

        //Générer une chaîne d'un octet à partir d'un nombre
        $hyphen = chr(45);

        //substr : Retourne un segment de chaîne
        $uuid = ""
        .substr($charid, 0, 8).$hyphen
        .substr($charid, 8, 4).$hyphen
        .substr($charid, 12, 4).$hyphen
        .substr($charid, 16, 4).$hyphen
        .substr($charid, 20, 12);
        return $uuid;
    }
}
