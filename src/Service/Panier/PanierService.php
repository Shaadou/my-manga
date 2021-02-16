<?php

namespace App\Service\Panier;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierService {

    // injection de dépendance

    protected $session;
    protected $productRepository;

    public function __construct(SessionInterface $session, ProduitRepository $productRepository) {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }

    public function add(int $idProduit) {
        $panier = $this->session->get('panier', []);

        if(!empty($panier[$idProduit])) {
            $panier[$idProduit]++;
        }else {
            $panier[$idProduit] = 1;
        }

        $this->session->set('panier', $panier);
    }

    public function remove(int $idProduit) {
        $panier = $this->session->get('panier', []);

        if(!empty($panier[$idProduit])) {
            unset($panier[$idProduit]);
        }

        $this->session->set('panier', $panier);
    }

    public function getFullCart(): array {
        
        $panier = $this->session->get('panier', []);

        $panierWithDatas = [];
        $total = 0;

        foreach ($panier as $id => $quantity) {
            $panierWithDatas[] = [
                'product' => $this->productRepository->find($id), 
                'quantity' =>$quantity
            ];
        }

        return $panierWithDatas;
    }

    public function getTotal(): float {

        $total = 0;

        $panierWithDatas = $this->getFullCart();

        // Afficher le total du panier
        foreach ($panierWithDatas as $item) {
            $totalItem = $item['product']->getPrix() * $item['quantity'];
            $total += $totalItem;
        }

        return $total;

    }

}