<?php

namespace App\Entity;

use App\Entity\Utilisateur;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="Trajet")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="App\Repository\TrajetRepository")
 */
class Trajet
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
    private $villeD;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeA;

    /**
     * @ORM\Column(type="date")
     */
    private $dateD;

    /**
     * @ORM\Column(type="date")
     */
    private $dateA;

    
    /**
     * @ORM\Column(type="integer")
     */
    private $place_dispo;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="float")
     */
    private $distance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $DureeT;

    /**
     * @ORM\Column(type="time")
     */
    private $heureD;

    /**
     * @ORM\Column(type="time")
     */
    private $heureA;

    /**
     * @ORM\Column(type="date")
     */
    private $date_ajout;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="trajet")
     */
    private $utilisateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="trajet")
     */
    private $reservation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="trajet")
     */
    private $avis;

    public function __construct()
    {
        $this->reservation = new ArrayCollection();
        $this->avis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilleD(): ?string
    {
        return $this->villeD;
    }

    public function setVilleD(string $villeD): self
    {
        $this->villeD = $villeD;

        return $this;
    }

    public function getVilleA(): ?string
    {
        return $this->villeA;
    }

    public function setVilleA(string $villeA): self
    {
        $this->villeA = $villeA;

        return $this;
    }

    public function getDateD(): ?\DateTimeInterface
    {
        return $this->dateD;
    }

    public function setDateD(\DateTimeInterface $dateD): self
    {
        $this->dateD = $dateD;

        return $this;
    }

    public function getDateA(): ?\DateTimeInterface
    {
        return $this->dateA;
    }

    public function setDateA(\DateTimeInterface $dateA): self
    {
        $this->dateA = $dateA;

        return $this;
    }


    public function getPlaceDispo(): ?int
    {
        return $this->place_dispo;
    }

    public function setPlaceDispo(int $place_dispo): self
    {
        $this->place_dispo = $place_dispo;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(float $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getDureeT(): ?int
    {
        return $this->DureeT;
    }

    public function setDureeT(?int $DureeT): self
    {
        $this->DureeT = $DureeT;

        return $this;
    }

    public function getHeureD(): ?\DateTimeInterface
    {
        return $this->heureD;
    }

    public function setHeureD(\DateTimeInterface $heureD): self
    {
        $this->heureD = $heureD;

        return $this;
    }

    public function getHeureA(): ?\DateTimeInterface
    {
        return $this->heureA;
    }

    public function setHeureA(\DateTimeInterface $heureA): self
    {
        $this->heureA = $heureA;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->date_ajout;
    }

    public function setDateAjout(\DateTimeInterface $date_ajout): self
    {
        $this->date_ajout = $date_ajout;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation[] = $reservation;
            $reservation->setTrajet($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservation->contains($reservation)) {
            $this->reservation->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getTrajet() === $this) {
                $reservation->setTrajet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
            $avi->setTrajet($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->contains($avi)) {
            $this->avis->removeElement($avi);
            // set the owning side to null (unless already changed)
            if ($avi->getTrajet() === $this) {
                $avi->setTrajet(null);
            }
        }

        return $this;
    }

    /**
     * @ORM\PrePersist()
    */
    public function prePersist()
    {
        $this->date_ajout = new \DateTime();
    }
}
