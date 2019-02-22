<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
 */
class Game
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
    private $Name;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="id")
     */

    private $idUser;

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }


    /**
     * @param mixed $idUser
     */

    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

//    /**
//     * @return Collection|Cards[]
//     */
//    public function getIdGame(): Collection
//    {
//        return $this->id_Game;
//    }
//
//    public function addIdGame(Cards $idGame): self
//    {
//        if (!$this->id_Game->contains($idGame)) {
//            $this->id_Game[] = $idGame;
//            $idGame->setGame($this);
//        }
//
//        return $this;
//    }
//
//    public function removeIdGame(Cards $idGame): self
//    {
//        if ($this->id_Game->contains($idGame)) {
//            $this->id_Game->removeElement($idGame);
//            // set the owning side to null (unless already changed)
//            if ($idGame->getGame() === $this) {
//                $idGame->setGame(null);
//            }
//        }
//
//        return $this;
//    }
}
