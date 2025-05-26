<?php

namespace App\Controller\Admin;

use App\Entity\TUserSetting;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TUserSettingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TUserSetting::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('tUser', 'User'),
            TextField::new('settingKey', 'Setting Key'),
            TextareaField::new('settingValue', 'Setting Value'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            TextField::new('createdBy')->hideOnForm(),
            TextField::new('updatedBy')->hideOnForm(),
        ];
    }
}