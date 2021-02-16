<?php

namespace App\Controller\Admin;

use App\Entity\DetailsCommande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DetailsCommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DetailsCommande::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
