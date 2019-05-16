<p align="center">
    <img src="logo.png" alt="Logo">
</p>

# URL-ID

Extract resource IDs (e.g. YouTube video ID) from URLs like a pro!

## Installation

```bash
composer require kminek/url-id
```

## Usage

```php
use Kminek\UrlId\Parser;

$parser = Parser::createWithDefaultProviders();

$urlId = $parser->parse('https://www.youtube.com/watch?v=9Vqyj77tJfo');

/*
Kminek\UrlId\UrlId {#1
  #id: "9Vqyj77tJfo"
  #resource: "video"
  #provider: "Kminek\UrlId\Provider\Youtube"
}
*/
```

`$urlId` will be `null` if ID cannot be parsed.

## Custom providers

You can implement your own parsing providers following way:

```php
use Kminek\UrlId\Provider\AbstractProvider;

class CustomProvider extends AbstractProvider
{
    /**
     * @return array
     */
    public static function getDomains(): array
    {
        return [
            'sample.com',
        ];
    }

    /**
     * @return array
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
        if (empty($this->path)) {
            return null;
        }

        return $this->path[0];
    }
}

$parser = Parser::createWithDefaultProviders();
$parser->addProvider(CustomProvider::class);

// or
// $parser = new Parser([CustomProvider::class]);

$urlId = $parser->parse('https://sample.com/23');

/*
Kminek\UrlId\UrlId {#1
  #id: "23"
  #resource: "article"
  #provider: "CustomProvider"
}
*/
```

## Running unit tests

```bash
composer test
```

