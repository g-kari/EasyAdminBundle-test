<?php

namespace App\Controller\Admin;

use App\Entity\TUser;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TUserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TUser::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('publicUserId', 'Public User ID'),
            TextField::new('userName', 'User Name'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            TextField::new('createdBy')->hideOnForm(),
            TextField::new('updatedBy')->hideOnForm(),
        ];
    }
}