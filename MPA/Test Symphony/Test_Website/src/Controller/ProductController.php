<?php
// src/Controller/ProductController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    public function index()
    {
        // ...

        // the `render()` method returns a `Response` object with the
        // contents created by the template
        return $this->render('product/index.html.twig', [
            'category' => '...',
            'promotions' => ['...', '...'],
        ]);

        // the `renderView()` method only returns the contents created by the
        // template, so you can use those contents later in a `Response` object
        $contents = $this->renderView('product/index.html.twig', [
            'category' => '...',
            'promotions' => ['...', '...'],
        ]);

        return new Response($contents);
    }
}
