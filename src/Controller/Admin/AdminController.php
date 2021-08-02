<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Adoptant;
use App\Entity\Annonceur;
use App\Entity\Breed;
use App\Entity\Categorie;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Doggies');
            
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        
        yield MenuItem::linkToCrud('Races de chien', 'fas fa-list', Breed::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Anonceurs', 'fas fa-list', Annonceur::class);
        yield MenuItem::linkToCrud('Adoptant', 'fas fa-list', Adoptant::class);
        yield MenuItem::linkToCrud('Administrateur', 'fas fa-list', Admin::class);
    }
}
