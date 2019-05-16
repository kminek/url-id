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

class YoutubeTest extends AbstractProviderTestCase
{
    /**
     * @return array
     */
    public function okDataProvider(): array
    {
        return [
            [
                'https://www.youtube.com/watch?v=2cc36Hc2n2s',
                '2cc36Hc2n2s',
                UrlIdInterface::RESOURCE_VIDEO,
            ],
        ];
    }

    /**
     * @return array
     */
    public function notOkDataProvider(): array
    {
        return [
            ['https://www.youtube.com/feed/history'],
        ];
    }
}
