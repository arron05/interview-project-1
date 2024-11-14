<?php

require 'vendor/autoload.php';

use InterviewProject\Services\FileParsers\CsvFileParser;
use InterviewProject\Services\CombinationCounter;
use InterviewProject\Services\ProductFactory;

// Parse CLI arguments
$options = getopt("", ["file:", "unique-combinations:"]);
if (empty($options['file']) || empty($options['unique-combinations'])) {
    die("Usage: php parser.php --file=example.csv --unique-combinations=output.csv\n");
}

$filePath = $options['file'];
$outputFile = $options['unique-combinations'];

// Initialize classes
$productFactory = new ProductFactory();
$parser = new CsvFileParser($filePath, $productFactory);
$counter = new CombinationCounter();

try {
    // Parse products
    $products = $parser->parse();

    // Count unique combinations
    $combinations = $counter->countCombinations($products);

    // Write combinations to output file
    $handle = fopen($outputFile, 'w');
    fputcsv($handle, ['make', 'model', 'colour', 'capacity', 'network', 'grade', 'condition', 'count']);
    foreach ($combinations as $combination) {
        fputcsv($handle, $combination);
    }
    fclose($handle);

    echo "Parsing completed and output saved to {$outputFile}\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
