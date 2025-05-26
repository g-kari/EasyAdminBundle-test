<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\TUser;
use App\Entity\MUserRole;
use App\Entity\TUserRole;
use App\Entity\LUserLog;
use App\Entity\TUserSetting;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('EasyAdminBundle Test');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Products', 'fa fa-tag', Product::class);
        
        yield MenuItem::section('User Management');
        yield MenuItem::linkToCrud('Users', 'fa fa-user', TUser::class);
        yield MenuItem::linkToCrud('User Roles', 'fa fa-users', TUserRole::class);
        yield MenuItem::linkToCrud('User Settings', 'fa fa-cog', TUserSetting::class);
        
        yield MenuItem::section('Master Data');
        yield MenuItem::linkToCrud('Roles', 'fa fa-id-badge', MUserRole::class);
        
        yield MenuItem::section('Logs');
        yield MenuItem::linkToCrud('User Logs', 'fa fa-history', LUserLog::class);
    }
}