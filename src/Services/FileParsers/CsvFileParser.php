<?php

namespace InterviewProject\Services\FileParsers;

use InterviewProject\Services\Product;
use InterviewProject\Services\ProductFactory;
use InterviewProject\Exceptions\MissingRequiredFieldException;

class CsvFileParser
{
    protected string $filePath;
    protected ProductFactory $productFactory;

    public function __construct(string $filePath, ProductFactory $productFactory)
    {
        $this->filePath = $filePath;
        $this->productFactory = $productFactory;
    }

    public function parse(): array
    {
        $products = [];
        if (($handle = fopen($this->filePath, 'r')) !== false) {
            $headers = fgetcsv($handle);
            $fieldMappings = [
                'make' => 'brand_name',
                'model' => 'model_name',
                'colour' => 'colour_name',
                'capacity' => 'gb_spec_name',
                'network' => 'network_name',
                'grade' => 'grade_name',
                'condition' => 'condition_name',
            ];
            while ($row = fgetcsv($handle)) {
                $data = [];
                foreach ($fieldMappings as $property => $csvColumn) {
                    $columnIndex = array_search($csvColumn, $headers);
                    
                    if ($columnIndex !== false && isset($row[$columnIndex])) {
                        $data[$property] = $row[$columnIndex];
                    } else {
                        $data[$property] = null;
                    }
                }
                try {
                    $product = new Product($data);
                    $products[] = $product;
                    echo json_encode($product, JSON_PRETTY_PRINT) . "\n";
                } catch (MissingRequiredFieldException $e) {
                    echo "Error: " . $e->getMessage() . "\n";
                }
            }
            fclose($handle);
        }

        return $products;
    }
}
