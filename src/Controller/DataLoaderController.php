<?php

namespace App\Controller;

use App\Entity\Carrier;
use App\Entity\Product;
use App\Entity\genres;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DataLoaderController extends AbstractController
{
    /**
     * @Route("/data", name="data_loader")
     */
    public function index(EntityManagerInterface $manager, UserRepository $repoUser): Response
    {
        $file_products = dirname(dirname(__DIR__))."\products.json";
        $file_genres = dirname(dirname(__DIR__))."\genres.json";
        $file_carriers = dirname(dirname(__DIR__))."\carrier.json";
        $data_products = json_decode(file_get_contents($file_products))[0]->rows;
        $data_genres = json_decode(file_get_contents($file_genres))[0]->rows;
        $data_carriers = json_decode(file_get_contents($file_carriers))[0]->rows;

        $genres = [];

        foreach ($data_genres as $data_genre) {
            $genre = new Genres();
            $genre->setName($data_genre[1])
                     ->setImage($data_genre[3]);
            //$manager->persist($genre);
            $genres[] = $genre;
        }

        $carriers = [];

        foreach ($data_carriers as $data_carrier) {
            $carrier = new Carrier();
            $carrier->setName($data_carrier[1])
                     ->setDescription($data_carrier[2])
                     ->setPrice($data_carrier[3]);
            //$manager->persist($carrier);
            $carriers[] = $carrier;
        }

        foreach ($data_products as $data_Product) {
            $product = new Product();
            $product->setName($data_Product[1])
                    ->setDescription($data_Product[2])
                    ->setPrice($data_Product[4])
                    ->setIsBestSeller($data_Product[5])
                    ->setIsNewArrival($data_Product[6])
                    ->setIsFeatured($data_Product[7])
                    ->setIsSpecialOffer($data_Product[8])
                    ->setImage($data_Product[9])
                    ->setQuantity($data_Product[10])
                    ->setTags($data_Product[12])
                    ->setSlug($data_Product[13])
                    ->setCreatedAt(new \DateTime());    
            //$manager->persist($product);
            $products[] = $product;
        }

       // $user = $repoUser->find(2);
       // $user->setRoles(['ROLE_ADMIN']);
        //$manager->flush();
        

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DataLoaderController.php',
        ]);
    }
}
