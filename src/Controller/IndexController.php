<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('rest/', name: 'REST:index1')]
    #[Route('/', name: 'RETS:index2')]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }
}
