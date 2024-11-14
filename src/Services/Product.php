<?php

namespace InterviewProject\Services;

use InterviewProject\Exceptions\MissingRequiredFieldException;

class Product
{
    public string $make;
    public string $model;
    public ?string $colour;
    public ?string $capacity;
    public ?string $network;
    public ?string $grade;
    public ?string $condition;

    public function __construct(array $data)
    {
        $requiredFields = ['make', 'model'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                throw new MissingRequiredFieldException("Field '{$field}' is required.");
            }
        }

        $this->make = $data['make'];
        $this->model = $data['model'];
        $this->colour = $data['colour'] ?? null;
        $this->capacity = $data['capacity'] ?? null;
        $this->network = $data['network'] ?? null;
        $this->grade = $data['grade'] ?? null;
        $this->condition = $data['condition'] ?? null;
    }
}
