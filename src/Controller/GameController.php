<?php


namespace App\Controller;

use App\Service\Game;
use Psr\Http\Message\ResponseInterface;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;


/**
 * Class GameController
 */
class GameController extends AppController
{
    private $config;

    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->config = $container->get('settings');
    }
    /**
     * Index action.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function indexAction(Request $request, Response $response, array $args): ResponseInterface
    {
        $gameId = null;
        if (array_key_exists('game_id', $args)) {
            $gameId = $args['game_id'];
        }
        return $this->render($response, $request, 'Game/game.twig', ['gameId' => $gameId, 'fieldSize' => $this->config['game']['fieldSize'], 'ships' => $this->config['game']['ships']]);
    }
}