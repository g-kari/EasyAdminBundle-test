<?php

namespace App\Entity;

use App\Repository\TUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TUserRepository::class)]
#[ORM\Table(name: 't_users')]
class TUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $publicUserId = null;

    #[ORM\Column(length: 255)]
    private ?string $userName = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deletedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $createdBy = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $updatedBy = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deletedBy = null;
    
    #[ORM\OneToMany(mappedBy: 'tUser', targetEntity: LUserLog::class)]
    private Collection $logs;
    
    #[ORM\OneToMany(mappedBy: 'tUser', targetEntity: TUserRole::class)]
    private Collection $userRoles;
    
    #[ORM\OneToMany(mappedBy: 'tUser', targetEntity: TUserSetting::class)]
    private Collection $settings;

    public function __construct()
    {
        $this->logs = new ArrayCollection();
        $this->userRoles = new ArrayCollection();
        $this->settings = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicUserId(): ?string
    {
        return $this->publicUserId;
    }

    public function setPublicUserId(string $publicUserId): static
    {
        $this->publicUserId = $publicUserId;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): static
    {
        $this->userName = $userName;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $updatedBy): static
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    public function getDeletedBy(): ?string
    {
        return $this->deletedBy;
    }

    public function setDeletedBy(?string $deletedBy): static
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    /**
     * @return Collection<int, LUserLog>
     */
    public function getLogs(): Collection
    {
        return $this->logs;
    }

    public function addLog(LUserLog $log): static
    {
        if (!$this->logs->contains($log)) {
            $this->logs->add($log);
            $log->setTUser($this);
        }

        return $this;
    }

    public function removeLog(LUserLog $log): static
    {
        if ($this->logs->removeElement($log)) {
            // set the owning side to null (unless already changed)
            if ($log->getTUser() === $this) {
                $log->setTUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TUserRole>
     */
    public function getUserRoles(): Collection
    {
        return $this->userRoles;
    }

    public function addUserRole(TUserRole $userRole): static
    {
        if (!$this->userRoles->contains($userRole)) {
            $this->userRoles->add($userRole);
            $userRole->setTUser($this);
        }

        return $this;
    }

    public function removeUserRole(TUserRole $userRole): static
    {
        if ($this->userRoles->removeElement($userRole)) {
            // set the owning side to null (unless already changed)
            if ($userRole->getTUser() === $this) {
                $userRole->setTUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TUserSetting>
     */
    public function getSettings(): Collection
    {
        return $this->settings;
    }

    public function addSetting(TUserSetting $setting): static
    {
        if (!$this->settings->contains($setting)) {
            $this->settings->add($setting);
            $setting->setTUser($this);
        }

        return $this;
    }

    public function removeSetting(TUserSetting $setting): static
    {
        if ($this->settings->removeElement($setting)) {
            // set the owning side to null (unless already changed)
            if ($setting->getTUser() === $this) {
                $setting->setTUser(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->userName ?: '';
    }
}