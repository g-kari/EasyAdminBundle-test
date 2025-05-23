<?php

namespace App\Controller\Admin;

use App\Entity\LUserLog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LUserLogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LUserLog::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('tUser', 'User'),
            TextField::new('logType', 'Log Type'),
            TextareaField::new('logMessage', 'Log Message'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            TextField::new('createdBy')->hideOnForm(),
            TextField::new('updatedBy')->hideOnForm(),
        ];
    }
}