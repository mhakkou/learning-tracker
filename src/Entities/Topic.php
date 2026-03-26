<?php

namespace Mhakkou\LearningTracker\Entities;

use DateTime;

class Topic {
    public function __construct(
        private ?int $id,
        private ?string $title,
        private ?string $descritption,
        private ?DateTime $createdAt,
        private ?DateTime $updatedAt,
        private ?Course $course
    )
    {
        $this->createdAt = $this->createdAt ?? new DateTime();
    }

        public function getId(): ?int
        {
                return $this->id;
        }

        public function getTitle(): string
        {
                return $this->title;
        }

        public function setTitle(?string $title): static
        {
                $this->title = $title;
                return $this;
        }

        public function getDescritption(): ?string
        {
                return $this->descritption;
        }


        public function setDescritption(?string $descritption): static
        {
                $this->descritption = $descritption;
                return $this;
        }

       
        public function getCreatedAt(): DateTime
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

      
        public function getCourse(): Course
        {
                return $this->course;
        }

       
        public function setCourse(?Course $course): static
        {
                $this->course = $course;
                return $this;
        }
}