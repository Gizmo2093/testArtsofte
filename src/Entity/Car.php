<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    private ?Brand $brand = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    private ?Model $model = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column]
    private ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return array<mixed>|null
     */
    public function getResponse(int $id = null): ?array
    {
       return $id ? [
           'id' => $this->getId(),
           'brand' => $this->getBrand()?->getResponse(),
           'model' => $this->getModel()?->getResponse(),
           'photo' => $this->getPhoto(),
           'price' => $this->getPrice()
        ]
           :
           [
               'id' => $this->getId(),
               'brand' => $this->getBrand()?->getResponse(),
               'photo' => $this->getPhoto(),
               'price' => $this->getPrice()
           ];
    }
}
