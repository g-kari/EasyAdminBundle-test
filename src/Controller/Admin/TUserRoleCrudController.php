<?php

namespace App\Controller\Admin;

use App\Entity\TUserRole;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TUserRoleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TUserRole::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('tUser', 'User'),
            AssociationField::new('mUserRole', 'Role'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            TextField::new('createdBy')->hideOnForm(),
            TextField::new('updatedBy')->hideOnForm(),
        ];
    }
}