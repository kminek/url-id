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

class WykopTest extends AbstractProviderTestCase
{
    /**
     * @return array
     */
    public function okDataProvider(): array
    {
        return [
            [
                'https://www.wykop.pl/link/4954849/lorem-ipsum/',
                '4954849',
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
            ['https://www.wykop.pl/wpis/41292639/lorem-ipsum/'],
        ];
    }
}
