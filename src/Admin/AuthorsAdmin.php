<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Authors;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollectionInterface;
use Sonata\AdminBundle\Show\ShowMapper;

final class AuthorsAdmin extends AbstractAdmin
{


    protected function configureRoutes(RouteCollectionInterface $collection): void
    {
        $collection->restore('delete');
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('name')
            ->add('dni')
            ->add('creationDate');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('name')
            ->add('dni')
            ->add('creationDate')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('name')
            ->add('dni')
            ->add('creationDate');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('name')
            ->add('dni')
            ->add('creationDate');
    }
}
