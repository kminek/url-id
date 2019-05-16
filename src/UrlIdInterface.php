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

namespace Kminek\UrlId;

interface UrlIdInterface
{
    const RESOURCE_VIDEO = 'video';
    const RESOURCE_ARTICLE = 'article';

    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getResource(): string;

    /**
     * @return string
     */
    public function getProvider(): string;

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return string
     */
    public function toJson(): string;
}
