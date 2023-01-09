<?php
namespace App\Controller;

use App\Entity\Unit;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UnitController extends AbstractController
{

    #[Route('rest/unit', name: 'REST:unit', methods: ['INDEX', 'GET'])]
    public function getUnitList(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $repo = $entityManager->getRepository(Unit::class);

        $unitList = [];

        foreach ($repo->getObjectList() as $unit) {
            $unitList[] = [
                'id' => $unit->getId(),
                'name' => $unit->getName(),
                'unit_type_id' => $unit->getUnitTypeId()
            ];
        }

        return new JsonResponse($unitList);
    }
}
