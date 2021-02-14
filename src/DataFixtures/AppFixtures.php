<?php

namespace App\DataFixtures;

use App\Entity\Commande;
use App\Entity\Contact;
use App\Entity\DetailsCommande;
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
            ->setPassword("mdp$i");

            $manager->persist($user);

            // PRODUIT
            $produit = new Produit();
            $produit->setReference("reference $i")
            ->setTitre("titre $i")
            ->setGenre("genre $i")
            ->setPhoto("photo $i");

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
