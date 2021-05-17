<?php

namespace App\Controller;

use App\Taxes\Calculator;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    protected $logger;
    protected $calculator;

    /**
     * @Route("/hello/{name?world}", name="hello")
     */
    public function hello($name, LoggerInterface $logger, 
    Calculator $calculator, Slugify $slugify)
    {
        $slugify = new Slugify();
        dump($slugify->slugify("hello World !"));
      
        $logger->error("Mon message de log !");
        
        $tva = $calculator->calcul(100);
        dump($tva);

        return new Response("Hello $name !");
    }
} 
