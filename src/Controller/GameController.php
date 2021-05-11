<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

class GAmeController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $robotPercy = ['name' => 'Percy','attacks' => ['Coup de caméra', 'Rouler', 'Lanceur de filet'],
        'img' => 'assets/images/game/Percyx600.jpg'];
        $robotGinny = ['name' => 'Ginny','attacks' => ['Coup d\'hélice', 'Charge', 'Réfléxion solaire'],
        'img' => 'assets/images/game/Ginnyx600.jpg'];
        $cardEpmpty = ['name' => ''];
        $robots = [$robotPercy, $cardEpmpty, $robotGinny];

        return $this->twig->render('Game/index.html.twig', [
            'robots' => $robots
        ]);
    }
}
