<?php
namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Constraints\Length;

// ...

class ProduitController extends AbstractController
{

    public function produitsInPanier(SessionInterface $session, CategorieRepository $repoCategorie)
    {

        $panier = $session->get('panier', []);
        $categories = $repoCategorie->findAll();

        return $this->render(
            'header/index.html.twig',
            [
                'nbrProduit' => $panier,
                'categories' => $categories,
            ]
        );
    }
}