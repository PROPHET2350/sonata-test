<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\BooksRepository;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class AuthorsAdminController extends CRUDController
{

    private BooksRepository $em;

    public function __construct(BooksRepository $em)
    {
        $this->em = $em;
    }

    protected function preDelete(Request $request, object $object): ?Response
    {

        $arr = $this->em->findByAuthor($object->getId());

        if ($arr != null) {
            $this->addFlash('sonata_flash_error', 'Author has books');
            return $this->redirectToList();
        }
        return null;
    }
}
