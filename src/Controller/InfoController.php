<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfoController extends AbstractController
{
    #[Route('info/', name: 'about')]
    public function index()
    {
        echo phpinfo();
    }
}
