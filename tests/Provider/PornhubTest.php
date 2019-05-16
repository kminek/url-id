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

class PornhubTest extends AbstractProviderTestCase
{
    /**
     * @return array
     */
    public function okDataProvider(): array
    {
        return [
            [
                'https://www.pornhub.com/view_video.php?viewkey=ph5cd0dd7fb3e59',
                'ph5cd0dd7fb3e59',
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
            ['https://www.pornhub.com/gif/22512711'],
        ];
    }
}
