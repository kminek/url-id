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

class UrlId implements UrlIdInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $resource;

    /**
     * @var string
     */
    protected $provider;

    /**
     * @param string $id
     * @param string $resource
     * @param string $provider
     */
    public function __construct(string $id, string $resource, string $provider)
    {
        $this->id = $id;
        $this->resource = $resource;
        $this->provider = $provider;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getResource(): string
    {
        return $this->resource;
    }

    /**
     * {@inheritdoc}
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'resource' => $this->getResource(),
            'provider' => $this->getProvider(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
