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

use InvalidArgumentException;
use Kminek\UrlId\Provider\AbstractProvider;
use LayerShifter\TLDExtract\Extract;
use Throwable;

class Parser implements ParserInterface
{
    /**
     * @var array
     */
    protected $domainProviderMap = [];

    /**
     * @return self
     *
     * @throws Throwable
     */
    public static function createWithDefaultProviders(): self
    {
        return new static(AbstractProvider::getDefaultProviders());
    }

    /**
     * @param array $providerClasses
     *
     * @throws Throwable
     */
    public function __construct(array $providerClasses = [])
    {
        foreach ($providerClasses as $providerClass) {
            $this->addProvider($providerClass);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function parse(string $url): ?UrlIdInterface
    {
        if (false === filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException(
                static::ERR_INVALID_URL
            );
        }

        $extract = new Extract();
        $result = $extract->parse($url);
        $registrableDomain = $result->getRegistrableDomain();

        if (!$registrableDomain) {
            return null;
        }

        if (!isset($this->domainProviderMap[$registrableDomain])) {
            return null;
        }

        $providerClass = $this->domainProviderMap[$registrableDomain];
        /** @var AbstractProvider $provider */
        $provider = new $providerClass($url, $result);

        $urlId = $provider->parse();
        if (!$urlId) {
            return null;
        }

        return new UrlId($urlId[0], $urlId[1], $providerClass);
    }

    /**
     * {@inheritdoc}
     */
    public function addProvider(string $providerClass): void
    {
        if (!is_a(
            $providerClass,
            AbstractProvider::class,
            true
        )) {
            throw new InvalidArgumentException(
                static::ERR_INVALID_PROVIDER_CLASS
            );
        }

        /** @var AbstractProvider $providerClass */
        foreach ($providerClass::getDomains() as $domain) {
            if (isset($this->domainProviderMap[$domain])) {
                throw new InvalidArgumentException(
                    static::ERR_DOMAIN_ALREADY_ADDED
                );
            }
            $this->domainProviderMap[$domain] = $providerClass;
        }
    }
}
