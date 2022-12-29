<?php
namespace App\Controller;

use App\Entity\UnitType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UnitTypeController extends AbstractController
{

    #[Route('rest/unit/type', name: 'REST:unit/type', methods: ['INDEX', 'GET'])]
    public function getUnitList(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $repo = $entityManager->getRepository(UnitType::class);

        $unitTypeList = [];

        foreach ($repo->getObjectList() as $type) {
            $unitTypeList[] = [
                'id' => $type->getId(),
                'name' => $type->getName()
            ];
        }

        return new JsonResponse($unitTypeList);
    }
}
