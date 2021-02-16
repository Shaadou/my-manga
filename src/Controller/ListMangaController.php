<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Category;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListMangaController extends AbstractController
{
    /**
     * @Route("/list_manga/{categorie}", defaults={"categorie"="snk"}, name="list_manga")
     */
    public function index($categorie, ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->findByCategorieById($categorie);

        $repoCategorie = $this->getDoctrine()->getRepository(Categorie::class);
        $categories = $repoCategorie->findAll();


        return $this->render('list_manga/index.html.twig', [
            'controller_name' => 'ListMangaController',
            'produits' => $produits,
            'categories' => $categories

        ]);
    }
}
