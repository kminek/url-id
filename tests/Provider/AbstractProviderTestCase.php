<?php

declare(strict_types=1);

/*
 * This file is part of the `kminek/url-id` package.
 *
 * (c) Grzesiek W <kontakt@kminek.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kminek\UrlId\Tests\Provider;

use Kminek\UrlId\Parser;
use Kminek\UrlId\ParserInterface;
use PHPUnit\Framework\TestCase;
use Throwable;

abstract class AbstractProviderTestCase extends TestCase
{
    /**
     * @var ParserInterface
     */
    protected $parser;

    /**
     * @throws Throwable
     */
    protected function setUp(): void
    {
        $this->parser = new Parser([
            $this->getProviderClass(),
        ]);
    }

    /**
     * @return string
     */
    protected function getProviderClass(): string
    {
        $className = static::class;
        // remove `Test` suffix
        $className = substr($className, 0, strlen($className) - 4);
        // remove `Tests` namespace
        $className = str_replace('Kminek\\UrlId\\Tests', 'Kminek\\UrlId', $className);

        return $className;
    }

    /**
     * @throws Throwable
     * @dataProvider okDataProvider
     */
    public function testOk($url, $expectedId, $expectedResource): void
    {
        $urlId = $this->parser->parse($url);

        $this->assertEquals($expectedId, $urlId->getId());
        $this->assertEquals($expectedResource, $urlId->getResource());
        $this->assertEquals($this->getProviderClass(), $urlId->getProvider());
    }

    /**
     * @throws Throwable
     * @dataProvider notOkDataProvider
     */
    public function testNotOk($url): void
    {
        $urlId = $this->parser->parse($url);

        $this->assertEquals(null, $urlId);
    }
}
