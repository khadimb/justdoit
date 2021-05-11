<?php

namespace App\Controller;

class FightersController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('Fighters/index.html.twig');
    }
}