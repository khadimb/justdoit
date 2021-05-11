<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

class GameController extends AbstractController
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
        $cardEmpty = ['name' => ''];
        $robots = [$robotPercy, $cardEmpty, $robotGinny];

        return $this->twig->render('Game/index.html.twig', [
            'robots' => $robots
        ]);
    }

    public function readyToGo(string $robotSelected)
    {
        $robotPercy = ['name' => 'Percy','attacks' => ['Coup de caméra', 'Rouler', 'Lanceur de filet'],
                    'img' => 'assets/images/game/Percyx600.jpg'];
        $robotGinny = ['name' => 'Ginny','attacks' => ['Coup d\'hélice', 'Charge', 'Réfléxion solaire'],
                    'img' => 'assets/images/game/Ginnyx600.jpg'];
        $gifAttacks = ['camera.gif' => 'Coup de caméra',
                    'roll.gif' => 'Rouler',
                    'net.gif' => 'Lanceur de filet',
                    'helix.gif' => 'Coup d\'hélice',
                    'charge.gif' => 'Charge',
                    'solar.gif' => 'Réfléxion solaire'
                    ];

        $attackPercy = $robotPercy['attacks'][rand(0, 2)];
        $attackGinny = $robotGinny['attacks'][rand(0, 2)];
        $attackPercyImg = array_search($attackPercy, $gifAttacks);
        $attackGinnyImg = array_search($attackGinny, $gifAttacks);

        $ginny = ['name' => 'Ginny', 'attack' => $attackGinny, 'img' => 'assets/images/weapons/' . $attackGinnyImg];
        $percy = ['name' => 'Percy', 'attack' => $attackPercy, 'img' => 'assets/images/weapons/' . $attackPercyImg];

        if ($attackGinny === 'Réfléxion solaire' && $attackPercy === 'Coup de caméra') {
            $robotWin = $ginny;
            $robotLose = $percy;
        } elseif ($attackGinny === 'Charge' && $attackPercy === 'Rouler') {
            $robotWin = $ginny;
            $robotLose = $percy;
        } elseif ($attackGinny === 'Coup d\'hélice' && $attackPercy === 'Lanceur de filet') {
            $robotWin = $ginny;
            $robotLose = $percy;
        } else {
            $robotWin = $percy;
            $robotLose = $ginny;
        }

        if ($robotSelected === $robotWin['name']) {
            $userWinOrNot = 'Vous avez gagné. &#128079';
        } else {
            $userWinOrNot = 'Vous avez misé sur le mauvais cheval. Essaye encore &#128512';
        }

        return $this->twig->render('Game/gameWinner.html.twig', [
            'robotWin' => $robotWin,
            'robotLose' => $robotLose,
            'UserWinOrNot' => $userWinOrNot
        ]);
    }
}
