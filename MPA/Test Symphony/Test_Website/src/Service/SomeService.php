<?php
// src/Service/SomeService.php
namespace App\Service;

use Twig\Environment;

class SomeService
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function someMethod()
    {
        // ...

        $htmlContents = $this->twig->render('product/index.html.twig', [
            'category' => '...',
            'promotions' => ['...', '...'],
        ]);
    }
}
