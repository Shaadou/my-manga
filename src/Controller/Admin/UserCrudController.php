<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextEditorField::new('nom'),
            TextEditorField::new('prenom'),
            TextEditorField::new('dateNaissance'),
            TextEditorField::new('email'),
            TextEditorField::new('adresse'),
            TextEditorField::new('cp'),
            AssociationField::new("commandes"),

        ];
    }
}
