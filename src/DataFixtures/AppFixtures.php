<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Category;
use App\Entity\Commande;
use App\Entity\Contact;
use App\Entity\DetailsCommande;
use App\Entity\Genre;
use App\Entity\Produit;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bridge\PhpUnit\TextUI\Command;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for($i = 1; $i <= 5; $i++) {

            // USER

            $user = new User();
            $user->setAdresse("Adresse nº$i")
            ->setCp("02200")
            ->setDateNaissance("01-01-2000")
            ->setEmail("email$i@gmail.com")
            ->setNom("Name $i")
            ->setPrenom("Prenom $i")
            ->setPassword("mdp$i")
            ->setAvatar("https://geeko.lesoir.be/wp-content/uploads/sites/58/2020/05/avatar-1024x577.jpg");

            $manager->persist($user);

            // CATEGORY
            $categorie = new Categorie();
            $categorie->setNom("catégorie $i");
            $manager->persist($categorie);

            // PRODUIT
            $produit = new Produit();
            $produit->setReference("reference $i")
            ->setTitre("titre $i")
            ->setCategorie($categorie)
            ->setPhoto("photo $i")
            ->setPrix($i * 12)
            ->setDescription("description nº$i");

            $manager->persist($produit);

            // CONTACT
            $contact = new Contact();
            $contact->setFirstName("")
            ->setNom("nom $i")
            ->setEmail("email$i@mail.com")
            ->setMessage("message $i");

            $manager->persist($contact);

            // COMMANDES
            $commande = new Commande();
            $commande->setIdMembre($user)
            ->setMontant(100*$i)
            ->setDateEnregistrement(new \DateTime("200-01-01"))
            ->setEtat("En cours");

            $manager->persist($commande);

            for($j = 1; $j <= 5; $j++) {
                // DETAILS COMMANDES
                $detail_commande = new DetailsCommande();
                $detail_commande->setIdCommande($commande)
                ->setIdProduit($produit)
                ->setPrix($j * 10)
                ->setQuantite($j)
                ->setTitre("titre $j");
                $manager->persist($detail_commande);

            }


        }

        $manager->flush();
    }
}
