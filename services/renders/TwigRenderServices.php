<?php
namespace App\services\renders;


class TwigRenderServices implements IRenderService

{
    protected $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../views/TwigTmpl');
        $this->twig = new \Twig\Environment($loader);
    }

    public function renderTmpl($template, $params = [])
    {
    //    ob_start();
        extract($params);

        return $this->twig->render($template . '.php', $params);
 //       include '' . $template . '.php';
     //   return ob_get_clean();
    }
}