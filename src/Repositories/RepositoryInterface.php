<?php

namespace Mhakkou\LearningTracker\Repositories;

interface RepositoryInterface {
    public function findAll(): array;
    
    public function find(int $id): ?object;

    public function findBy(array $options): array;

    public function findOneBy(array $options): array;

    public function save(object $object): object;

    public function delete(int $id): bool;
}