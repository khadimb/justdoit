<?php

namespace App\Controller;

class EnvironmentController extends AbstractController
{
    public function environment()
    {
        return $this->twig->render('Environment/environment.html.twig');
    }
}
