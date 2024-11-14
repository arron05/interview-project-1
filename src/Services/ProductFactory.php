<?php

namespace InterviewProject\Services;

class ProductFactory
{
    public function createProduct(array $data): Product
    {
        return new Product($data);
    }
}
