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

use LayerShifter\TLDExtract\ResultInterface;

abstract class AbstractProvider
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string|null
     */
    protected $scheme;

    /**
     * @var string|null
     */
    protected $host;

    /**
     * @var int|null
     */
    protected $port;

    /**
     * @var string|null
     */
    protected $user;

    /**
     * @var string|null
     */
    protected $pass;

    /**
     * @var array|null
     */
    protected $path;

    /**
     * @var array|null
     */
    protected $query;

    /**
     * @var string|null
     */
    protected $fragment;

    /**
     * @var ResultInterface
     */
    protected $result;

    /**
     * @return array
     */
    abstract public static function getDomains(): array;

    /**
     * @return array
     */
    abstract public static function getResources(): array;

    /**
     * @param string          $url
     * @param ResultInterface $result
     */
    public function __construct(string $url, ResultInterface $result)
    {
        $this->url = $url;

        foreach (parse_url($url) as $k => $v) {
            $this->{$k} = $v;
        }

        $this->path = ltrim($this->path, '/');
        $this->path = empty($this->path) ? [] : explode('/', $this->path);

        if (!empty($this->query)) {
            parse_str($this->query, $this->query);
        } else {
            $this->query = [];
        }

        $this->result = $result;
    }

    /**
     * @return array|null
     */
    public function parse(): ?array
    {
        foreach (static::getResources() as $resource) {
            $method = 'parse'.ucfirst($resource).'ResourceId';
            $urlId = $this->{$method}();
            if (null !== $urlId) {
                return [$urlId, $resource];
            }
        }

        return null;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    protected function pathContains(string $key): bool
    {
        return in_array($key, $this->path, true);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    protected function queryContains(string $key): bool
    {
        return isset($this->query[$key]);
    }

    /**
     * @return array
     */
    public static function getDefaultProviders(): array
    {
        return [
            Hackernews::class,
            Instagram::class,
            Pornhub::class,
            Pudelek::class,
            Redtube::class,
            Vimeo::class,
            Wykop::class,
            Xhamster::class,
            Xvideos::class,
            Youtube::class,
        ];
    }
}
