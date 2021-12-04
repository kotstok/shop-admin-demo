<?php

declare(strict_types=1);

namespace App\Library\Parser;

use Symfony\Component\DomCrawler\Crawler;

final class PriceParserV extends MainParser
{
    public function getProductPrice(string $url): ?float
    {
        return $this->parseHtml(
            $this->getHtml($url, '.product-new-price.has-deal')
        );
    }

    /**
     * @return float|null NULL - parsing fail
     */
    private function parseHtml(Crawler $dom): ?float
    {
        $amount = $dom->innerText();
        $sup = $dom->children('sup')->getNode(0);
        if (null === $sup) {
            return null;
        }

        $amount .= '.'.$sup->nodeValue;

        return is_numeric($amount) ? (float) $amount : null;
    }
}
