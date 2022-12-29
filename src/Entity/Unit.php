<?php

namespace App\Entity;

use App\Repository\UnitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnitRepository::class)]
class Unit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    #[ORM\ManyToOne(targetEntity: UnitType::class, inversedBy: 'Unit')]
    private ?int $unit_type_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $keywords = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUnitTypeId(): ?int
    {
        return $this->unit_type_id;
    }

    public function setUnitTypeId(int $unit_type_id): self
    {
        $this->unit_type_id = $unit_type_id;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }
}
