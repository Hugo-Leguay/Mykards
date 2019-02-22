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
     * @ORM\OneToMany(targetEntity="App\Entity\Cards", mappedBy="currentCards")
     */
    private $currentCards;

    public function __construct()
    {
        $this->currentCards = new ArrayCollection();
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
    public function getCurrentCards(): Collection
    {
        return $this->currentCards;
    }

    public function addCurrentCard(Cards $currentCard): self
    {
        if (!$this->currentCards->contains($currentCard)) {
            $this->currentCards[] = $currentCard;
            $currentCard->setCurrentCards($this);
        }

        return $this;
    }

    public function removeCurrentCard(Cards $currentCard): self
    {
        if ($this->currentCards->contains($currentCard)) {
            $this->currentCards->removeElement($currentCard);
            // set the owning side to null (unless already changed)
            if ($currentCard->getCurrentCards() === $this) {
                $currentCard->setCurrentCards(null);
            }
        }

        return $this;
    }
}
