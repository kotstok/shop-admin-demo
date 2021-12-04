<?php

namespace App\Tests;

use App\Library\Parser\PriceParserV;

class PriceParserVTest extends \Codeception\Test\Unit
{
    private const TEST_PRODUCT_URL = 'https://www.emag.ro/gherghef-lemn-prym-611679/pd/D252J0BBM/';

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->pp = new PriceParserV();
    }

    public function testGetProductPrice(): void
    {
        $this->assertIsFloat($this->pp->getProductPrice(self::TEST_PRODUCT_URL));
    }
}
