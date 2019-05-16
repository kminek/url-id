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

class Hackernews extends AbstractProvider
{
    /**
     * {@inheritdoc}
     */
    public static function getDomains(): array
    {
        return [
            'ycombinator.com',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getResources(): array
    {
        return [
            UrlIdInterface::RESOURCE_ARTICLE,
        ];
    }

    /**
     * @return string|null
     */
    public function parseArticleResourceId(): ?string
    {
        if (!isset($this->path[0])) {
            return null;
        }

        if (!('item' === $this->path[0])) {
            return null;
        }

        if (!$this->queryContains('id')) {
            return null;
        }

        $urlId = $this->query['id'];

        if (!is_numeric($urlId)) {
            return null;
        }

        return $urlId;
    }
}
