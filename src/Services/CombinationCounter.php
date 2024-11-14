<?php

namespace InterviewProject\Services;

class CombinationCounter
{
    public function countCombinations(array $products): array
    {
        $counts = [];

        foreach ($products as $product) {
            $key = "{$product->make}_{$product->model}_{$product->colour}_{$product->capacity}_{$product->network}_{$product->grade}_{$product->condition}";

            if (!isset($counts[$key])) {
                $counts[$key] = [
                    'make' => $product->make,
                    'model' => $product->model,
                    'colour' => $product->colour,
                    'capacity' => $product->capacity,
                    'network' => $product->network,
                    'grade' => $product->grade,
                    'condition' => $product->condition,
                    'count' => 0
                ];
            }

            $counts[$key]['count']++;
        }

        return $counts;
    }
}
