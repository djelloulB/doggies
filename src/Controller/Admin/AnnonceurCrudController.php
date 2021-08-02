<?php

namespace App\Controller\Admin;

use App\Entity\Annonceur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnnonceurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Annonceur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('email'),
            TextField::new('motDePasse'),
            TextField::new('residence'),
            TextField::new('telephone'),
            TextField::new('ville'),
            TextField::new('departement'),
        ];
    }
    
}
