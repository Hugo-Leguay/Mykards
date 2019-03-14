<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CurrentCardsRepository")
 */
class CurrentCards
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NameCard;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Cards", mappedBy="currentCards")
     */
    private $cards;

    public function __construct()
    {
        $this->currentCards = new ArrayCollection();
        $this->cards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCard(): ?string
    {
        return $this->NameCard;
    }

    public function setNameCard(string $NameCard): self
    {
        $this->NameCard = $NameCard;

        return $this;
    }

    /**
     * @return Collection|Cards[]
     */
    public function getCards(): Collection
    {
        return $this->cards;
    }

    public function addCard(Cards $card): self
    {
        if (!$this->cards->contains($card)) {
            $this->cards[] = $card;
            $card->addCurrentCard($this);
        }

        return $this;
    }

    public function removeCard(Cards $card): self
    {
        if ($this->cards->contains($card)) {
            $this->cards->removeElement($card);
            $card->removeCurrentCard($this);
        }

        return $this;
    }
}
