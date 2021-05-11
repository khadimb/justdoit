<?php

namespace App\Controller;

class WeaponsController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Weapons/weapons.html.twig');
    }
}
