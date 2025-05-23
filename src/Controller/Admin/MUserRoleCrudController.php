<?php

namespace App\Controller\Admin;

use App\Entity\MUserRole;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MUserRoleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MUserRole::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('roleName', 'Role Name'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            TextField::new('createdBy')->hideOnForm(),
            TextField::new('updatedBy')->hideOnForm(),
        ];
    }
}