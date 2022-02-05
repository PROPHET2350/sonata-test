<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Authors;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

final class BooksAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('name')
            ->add('isbn');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('name')
            ->add('isbn')
            ->add('authors')
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
            ->with('books')
            ->add('name')
            ->add('isbn')
            ->end()
            ->with('Authors')
            ->add('authors', ModelType::class, [
                'class' => Authors::class,
                'required' => true,
                'multiple' => true,
            ])
            ->end();
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('name')
            ->add('isbn');
    }
}
