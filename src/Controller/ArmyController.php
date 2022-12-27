<?php
namespace App\Controller;

use App\Entity\Army;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ArmyController extends AbstractController
{

    #[Route('rest/army', name: 'REST:army', methods: ['INDEX', 'GET'])]
    public function getArmyList(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $repo = $entityManager->getRepository(Army::class);

        $armyList = [];

        foreach ($repo->getObjectList() as $army) {
            $armyList[] = [
                'id' => $army->getId(),
                'name' => $army->getName()
            ];
        }

        return new JsonResponse($armyList);
    }
}
