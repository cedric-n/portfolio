<?php

namespace App\Entity;

use App\Repository\RealisationRepository;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=RealisationRepository::class)
 * @Vich\Uploadable
 */
class Realisation
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *     message="le champ {{ label }} ne doit pas être vide."
     * )
     */
    private ?string $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *     message="le champ {{ label }} ne doit pas être vide."
     *  )
     */
    private ?string $category;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private ?DateTimeInterface $beginAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @var ?string
     */
    private ?string $poster = '';

    /**
     * @Vich\UploadableField(mapping="poster_file", fileNameProperty="poster")
     * @var ?File
     */
    private ?File $posterFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTimeInterface $updateAt;

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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

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

    public function getBeginAt(): ?DateTimeInterface
    {
        return $this->beginAt;
    }

    public function setBeginAt(?DateTimeInterface $beginAt): self
    {
        $this->beginAt = $beginAt;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function setPosterFile(?File $image = null):self
    {

        $this->posterFile = $image;

        if($image) {
            $this->updateAt = new DateTimeImmutable();
        }

        return $this;
    }


    public function getPosterFile(): ?File
    {
        return $this->posterFile;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }
}
