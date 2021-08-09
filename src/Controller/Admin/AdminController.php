<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Adoptant;
use App\Entity\Annonceur;
use App\Entity\Breed;
use App\Entity\Categorie;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\SubMenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\UrlMenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use PhpParser\Node\Expr\Yield_;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 */
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
        yield MenuItem::linktoDashboard('Dashboard', 'fas fa-tools');
        
        yield MenuItem::linkToUrl('View HomePage' , 'fa fa-home','/')->setLinkTarget('_blank');
        yield MenuItem::linkToCrud('Races de chien', 'fas fa-list', Breed::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Anonceurs', 'fas fa-list', Annonceur::class);
        yield MenuItem::linkToCrud('Adoptant', 'fas fa-list', Adoptant::class);
        yield MenuItem::linkToCrud('Administrateur', 'fas fa-list', Admin::class);
    }
}
