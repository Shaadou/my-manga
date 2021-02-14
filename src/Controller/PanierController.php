<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Service\Panier\PanierService as PanierPanierService;
use App\Service\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(PanierPanierService $panierService): Response
    {   

        $panierWithDatas = $panierService->getFullCart();
        $total = $panierService->getTotal();
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'items' => $panierWithDatas,
            'total' => $total
        ]);
    }

    /**
     * @Route("/panier/add/{idProduit}", name="panier_add")
     */
    public function add($idProduit, PanierPanierService $panierService) {
        
        // accéder á la session

        $panierService->add($idProduit);

        return $this->redirectToRoute("panier");

    }

    /**
     * @Route("/panier/remove/{idProduit}", name="panier_remove")
     */
    public function remove($idProduit, PanierPanierService $panierService) {

        $panierService->remove($idProduit);
        return $this->redirectToRoute("panier");

    }

}
