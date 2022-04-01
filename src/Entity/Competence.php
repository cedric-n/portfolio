<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 */
class Competence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *  message="Le {{ label }} ne doit pas avoir un contenue vide."
     * )
     * @Assert\Length(
     *  min=3,
     *  minMessage="La longueur doit être au minimum de {{ limit }}, celle actuelle est de {{ value }}.",
     *  maxMessage="La longueur de {{ label }} doit être au maximum de {{ limit }}, celle actuelle est de {{ value }}."
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull(
     *  message="Le {{ label }} ne doit pas être null, choisissez un niveau à votre compétence."
     * )
     * @Assert\PositiveOrZero(
     *  message="Le {{ label }} doit soit être à 0 ou un nombre positif."
     * )
     */
    private $level;

    /**
     * @ORM\ManyToMany(targetEntity=Realisation::class, inversedBy="competences")
     */
    private $realisations;

    public function __construct()
    {
        $this->realisations = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|Realisation[]
     */
    public function getRealisations(): Collection
    {
        return $this->realisations;
    }

    public function addRealisation(Realisation $realisation): self
    {
        if (!$this->realisations->contains($realisation)) {
            $this->realisations[] = $realisation;
        }

        return $this;
    }

    public function removeRealisation(Realisation $realisation): self
    {
        $this->realisations->removeElement($realisation);

        return $this;
    }
}
