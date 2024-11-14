**Interview Project 1 - Product Combination Counter**

This is a simple PHP-based project designed to parse a CSV file containing product details and count unique combinations of product attributes. The project consists of a few core components:

1. **CSV File Parser**: Reads a CSV file with product details.
1. **Combination Counter**: Counts unique combinations of products based on multiple attributes.
1. **Product Factory and Product Classes**: Manages and validates product data.

**Requirements**

- PHP >= 7.4
- Composer (for dependency management)

**Installation**

**1. Clone the repository**

git clone https://github.com/arron05/interview-project-1.git

cd interview-project-1

**2. Install dependencies**

Run the following command to install the project dependencies:

composer install

This will install the necessary libraries, including PHPUnit for running tests.

**Project Structure**

- **src/**: Contains the core PHP files, including services and product logic.
  - **Services/**: Contains the FileParsers, CombinationCounter, and Product classes.
- **tests/**: Contains PHPUnit test files to verify the application's functionality.
- **composer.json**: Contains the project metadata and dependencies.
- **parser.php**: The command-line script for parsing a CSV file and counting combinations.

**Usage**

**Running the Parser**

You can run the parser via the command line, passing a CSV file as an argument:

php parser.php --file=products\_comma\_separated.csv --unique-combinations=combination\_count.csv

This will process the products\_comma\_separated.csv file, count the unique combinations of product attributes, and save the result in combination\_count.csv.

**CSV Format**

The expected CSV format should have the following headers:

"brand\_name","model\_name","condition\_name","grade\_name","gb\_spec\_name","colour\_name","network\_name"

Ensure the data in the CSV matches this structure for proper processing.

**Unit Tests**

To run the unit tests, use PHPUnit:

./vendor/bin/phpunit

This will run all the tests in the tests/ directory. You can also run tests for specific files:

./vendor/bin/phpunit tests/CombinationCounterTest.php

**Features**

- **CSV File Parsing**: Reads product data from a CSV file and parses it into individual products.
- **Combination Counting**: Counts unique combinations based on attributes such as make, model, colour, capacity, network, grade, and condition.
- **Data Validation**: Ensures that required fields (make and model) are provided for each product.
- **Custom Error Handling**: Throws meaningful exceptions when required fields are missing or invalid.

**Example**

Given a CSV file with the following contents:

"brand\_name","model\_name","condition\_name","grade\_name","gb\_spec\_name","colour\_name","network\_name"

"Apple","iPhone 6s","Used","Grade A","256GB","Red","Unlocked"

"Apple","iPhone 6s","Used","Grade A","256GB","Red","Unlocked"

"Apple","iPhone 7","Used","Grade B","128GB","Black","Unlocked"

The application will output a combination count like:

make,model,colour,capacity,network,grade,condition,count

Apple,iPhone 6s,Red,256GB,Unlocked,Grade A,Used,2

Apple,iPhone 7,Black,128GB,Unlocked,Grade B,Used,1

**How It Works**

- The script reads the CSV file, mapping each product's attributes (e.g., brand\_name to make, model\_name to model, etc.).
- The CombinationCounter service then counts how many times each unique combination appears.
- The results are saved in the combination\_count.csv file.

