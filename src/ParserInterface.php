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

use Throwable;

interface ParserInterface
{
    const ERR_INVALID_URL = 'Invalid URL';
    const ERR_INVALID_PROVIDER_CLASS = 'Invalid provider class';
    const ERR_DOMAIN_ALREADY_ADDED = 'Domain already added';

    /**
     * @param string $url
     *
     * @return UrlIdInterface|null
     *
     * @throws Throwable
     */
    public function parse(string $url): ?UrlIdInterface;

    /**
     * @param string $providerClass
     *
     * @throws Throwable
     */
    public function addProvider(string $providerClass): void;
}
