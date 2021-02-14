<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(ProduitCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My Manga');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('My Mangas'),
            MenuItem::linkToCrud('Produit', 'fa fa-tags', ProduitCrudController::class)->setController(ProduitCrudController::class),
            MenuItem::linkToCrud('Membres', 'fa fa-file-text', UserCrudController::class)->setController(UserCrudController::class),

            MenuItem::section('Mes commandes'),
            MenuItem::linkToCrud('Commandes', 'fa fa-tags', CommandeCrudController::class)->setController(CommandeCrudController::class),


            MenuItem::section('Demandes de contact'),
            MenuItem::linkToCrud('Contacts', 'fa fa-tags', ContactCrudController::class)->setController(ContactCrudController::class),

        ];
    }
}
