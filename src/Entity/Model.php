<?php

namespace App\Entity;

use App\Repository\ModelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModelRepository::class)
 */
class Model
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=31, nullable=true)
     */
    private $matter;

    /**
     * @ORM\Column(type="string", length=31, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=31)
     */
    private $mtype;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatter(): ?string
    {
        return $this->matter;
    }

    public function setMatter(?string $matter): self
    {
        $this->matter = $matter;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMtype(): ?string
    {
        return $this->mtype;
    }

    public function setMtype(string $mtype): self
    {
        $this->mtype = $mtype;

        return $this;
    }
}
