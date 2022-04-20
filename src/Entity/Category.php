<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'date')]
    private $created_date;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Board::class)]
    private $boards_list;

    public function __construct()
    {
        $this->boards_list = new ArrayCollection();
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

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->created_date;
    }

    public function setCreatedDate(\DateTimeInterface $created_date): self
    {
        $this->created_date = $created_date;

        return $this;
    }


    /**
     * @return Collection<int, Board>
     */
    public function getBoardsList(): Collection
    {
        return $this->boards_list;
    }

    public function addBoardsList(Board $boardsList): self
    {
        if (!$this->boards_list->contains($boardsList)) {
            $this->boards_list[] = $boardsList;
            $boardsList->setCategory($this);
        }

        return $this;
    }

    public function removeBoardsList(Board $boardsList): self
    {
        if ($this->boards_list->removeElement($boardsList)) {
            // set the owning side to null (unless already changed)
            if ($boardsList->getCategory() === $this) {
                $boardsList->setCategory(null);
            }
        }

        return $this;
    }
}