<?php

declare(strict_types=1);

namespace App\Library\Parser;

use Symfony\Component\DomCrawler\Crawler;

abstract class MainParser
{
    abstract public function getProductPrice(string $url): ?float;

    protected function getHtml(string $url, string $selector = ''): Crawler
    {
        $c = curl_init($url);
        curl_setopt($c, CURLOPT_POST, 0);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64; rv:10.0) Gecko/20100101 Firefox/10.0');

        $html = (string) curl_exec($c);

        curl_close($c);

        $crawler = new Crawler($html);

        return '' !== $selector ? $crawler->filter($selector) : $crawler;
    }
}
