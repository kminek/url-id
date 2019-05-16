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

use Kminek\UrlId\UrlIdInterface;

class HackernewsTest extends AbstractProviderTestCase
{
    /**
     * @return array
     */
    public function okDataProvider(): array
    {
        return [
            [
                'https://news.ycombinator.com/item?id=19925851',
                '19925851',
                UrlIdInterface::RESOURCE_ARTICLE,
            ],
        ];
    }

    /**
     * @return array
     */
    public function notOkDataProvider(): array
    {
        return [
            ['https://news.ycombinator.com/jobs'],
        ];
    }
}
