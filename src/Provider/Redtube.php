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

class Redtube extends AbstractProvider
{
    /**
     * {@inheritdoc}
     */
    public static function getDomains(): array
    {
        return [
            'redtube.com',
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
        if (!isset($this->path[0])) {
            return null;
        }

        if (!is_numeric($this->path[0])) {
            return null;
        }

        return $this->path[0];
    }
}
