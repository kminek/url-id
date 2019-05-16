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

class VimeoTest extends AbstractProviderTestCase
{
    /**
     * @return array
     */
    public function okDataProvider(): array
    {
        return [
            [
                'https://vimeo.com/111265150',
                '111265150',
                UrlIdInterface::RESOURCE_VIDEO,
            ],
            [
                'https://vimeo.com/111265150?some=variable',
                '111265150',
                UrlIdInterface::RESOURCE_VIDEO,
            ],
            [
                'https://player.vimeo.com/video/111265150',
                '111265150',
                UrlIdInterface::RESOURCE_VIDEO,
            ],
            [
                'https://player.vimeo.com/video/111265150?some=variable',
                '111265150',
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
            ['https://vimeo.com/ramandjafari'],
        ];
    }
}
