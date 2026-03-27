<?php

namespace Mhakkou\LearningTracker\Repositories;

use Mhakkou\LearningTracker\Entities\Course;

interface RepositoryInterface {
    public function findAll(): array;
    
    public function find(int $id): ?Course;

    public function findBy(array $options): array;

    public function findOneBy(array $options): array;

    public function save(Course $course): Course;

    public function delete(int $id): bool;
}