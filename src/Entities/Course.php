<?php

namespace Mhakkou\LearningTracker\Entities;

use DateTime;
use Mhakkou\LearningTracker\Enumeration\CourseEnum;

class Course {

    public function __construct(
        private ?int $id,
        private ?string $name,
        private ?string $description,
        private ?DateTime $createdAt,
        private ?DateTime $updatedAt,
        private ?CourseEnum $status,
        private ?User $createdBy
    )
    {
        $this->createdAt = $this->createdAt ?? new DateTime();
        $this->status = $this->status ?? CourseEnum::NOT_STARTED;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static 
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string 
    {
        return $this->name;
    }

    public function setName(?string $name): static 
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string 
    {
        return $this->description;
    }

    public function setDescription(?string $descripton): static {
        $this->description = $descripton;
        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getStatus(): ?CourseEnum
    {
        return $this->status;
    }

    public function setStatus(?CourseEnum $status): static 
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedBy(): ?User 
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): static
    {
        $this->createdBy = $createdBy;
        return $this;
    }
}
