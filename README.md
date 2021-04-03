# URL Pattern Matcher

Check if a given path like (`/articles/4`) matches a given pattern like (`/articles/*`).

## Installation

You can install the package via composer:

```bash
composer require honda/url-pattern-matcher
```

## Usage

Trailing `/` are ignored so the matcher if given `/example` will match `/example`, `example`, `example/`, `/example/`.

```php
use Honda\UrlPatternMatcher\UrlPatternMatcher;
$urlPatternMatcher = new UrlPatternMatcher('/articles/edit');

$urlPatternMatcher->match('/articles');

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

**Url Pattern Matcher** was created by **[Félix Dorn](https://twitter.com/afelixdorn)** under
the **[MIT license](https://opensource.org/licenses/MIT)**.
