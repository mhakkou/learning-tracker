<?php

namespace Mhakkou\LearningTracker\Repositories;

use DateTime;
use Mhakkou\LearningTracker\Database\Connection;
use Mhakkou\LearningTracker\Entities\Course;
use Mhakkou\LearningTracker\Enumeration\CourseEnum;

class CourseRepository implements RepositoryInterface {

    public function __construct(private \PDO $pdo)
    {}

    public function findAll(): array
    {
        $courses = [];
        $stmt = $this->pdo->query("SELECT * FROM courses");
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach($res as $row){
            $courses[] = new Course(
                $row['id'],
                $row['name'],
                $row['description'],
                new DateTime($row['created_at']),
                new DateTime($row['updated_at']),
                CourseEnum::tryFrom($row['status']),
                $row['created_by'],
            );
        }
        return $courses;
    }

    public function find(int $id): ?Course
    {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Course(
            (int)$row['id'],
            $row['name'],
            $row['description'],
            new DateTime($row['created_at']),
            new DateTime($row['updated_at']),
            CourseEnum::tryFrom($row['status']),
            $row['created_by']
        );
    }

    public function findBy(array $options): array
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function findOneBy(array $options): array
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function save(Course $course): Course
    {
        $course->setUpdatedAt(new DateTime());

        if ($course->getId() === null) {
            return $this->insert($course);
        }

        return $this->update($course);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM courses WHERE id = ?");
        return $stmt->execute([$id]);
    }

    private function update(Course $course): Course
    {
        $sql = "UPDATE courses 
                SET name = :name, 
                    description = :description, 
                    updated_at = :updated_at, 
                    status = :status 
                WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        
        $params = $this->mapObjectToParams($course);
        $params['id'] = $course->getId();

        $stmt->execute($params);

        return $course;
    }

    private function mapObjectToParams(Course $course): array
    {
        return [
            'name'         => $course->getName(),
            'description'  => $course->getDescription(),
            'created_at'   => $course->getCreatedAt()->format('Y-m-d H:i:s'),
            'updated_at'   => $course->getUpdatedAt()->format('Y-m-d H:i:s'),
            'status'       => $course->getStatus()->value,
            'created_by'   => $course->getCreatedBy(),
        ];
    }

    private function insert(Course $course): Course
    {
        $sql = "INSERT INTO courses (name, description, created_at, updated_at, status, created_by)
                VALUES (:name, :description, :created_at, :updated_at, :status, :created_by)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($this->mapObjectToParams($course));
        $id = (int)$this->pdo->lastInsertId();
        $course->setId($id);

        return $course;
    }

}