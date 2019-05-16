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

class RedtubeTest extends AbstractProviderTestCase
{
    /**
     * @return array
     */
    public function okDataProvider(): array
    {
        return [
            [
                'https://www.redtube.com/668185',
                '668185',
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
            ['https://www.redtube.com/gallery/11956211'],
        ];
    }
}
