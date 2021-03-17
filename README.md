# URL Pattern Matcher

Check if a given path like (`/articles/4`) matches a given pattern like (`/articles/*`).

## Installation

You can install the package via composer:

```bash
composer require honda/url-pattern-matcher
```

## Usage

```php
use Honda\UrlPatternMatcher\UrlPatternMatcher;
$urlPatternMatcher = new UrlPatternMatcher('/articles/edit');

// See fnmatch() function for reference on how the matching works.
$urlPatternMatcher->match('/articles/*/edit');

// Matches if the path starts with /articles
$urlPatternMatcher->match('^/articles');

// Matches if the path ends with /articles
$urlPatternMatcher->match('/articles$');
```

Note: You **can not** combine matchers and do something like `^/articles/*`. I have no plans to support it.
## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Félix Dorn](https://github.com/laravel-honda)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
