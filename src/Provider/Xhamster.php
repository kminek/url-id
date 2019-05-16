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

namespace Kminek\UrlId\Provider;

use Kminek\UrlId\UrlIdInterface;

class Xhamster extends AbstractProvider
{
    /**
     * {@inheritdoc}
     */
    public static function getDomains(): array
    {
        return [
            'xhamster.com',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getResources(): array
    {
        return [
            UrlIdInterface::RESOURCE_VIDEO,
        ];
    }

    /**
     * @return string|null
     */
    public function parseVideoResourceId(): ?string
    {
        if (empty($this->path)) {
            return null;
        }

        if ('videos' !== $this->path[0]) {
            return null;
        }

        $end = end($this->path);
        $endArr = explode('-', $end);
        $urlId = end($endArr);
        if (!is_numeric($urlId)) {
            return null;
        }

        return $urlId;
    }
}
