<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/products")
 */
class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $updatePriceButton = Action::new('update_price', 'Update Price')
            ->linkToCrudAction('index');

        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_INDEX, $updatePriceButton)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('sku', 'SKU'),
            TextField::new('url', 'URL (for parsing)'),
            TextField::new('min_price', 'Min price'),
            AssociationField::new('company')->autocomplete(),
        ];
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets->addCssFile('css/admin.css');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setFormThemes([
                'admin/form_theme.html.twig',
                '@EasyAdmin/crud/form_theme.html.twig',
            ]);
    }
}
