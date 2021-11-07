# URL Pattern Matcher
[![Tests](https://github.com/laravel-honda/url-pattern-matcher/actions/workflows/tests.yml/badge.svg?branch=master)](https://github.com/laravel-honda/url-pattern-matcher/actions/workflows/tests.yml)
[![Formats](https://github.com/laravel-honda/url-pattern-matcher/actions/workflows/formats.yml/badge.svg?branch=master)](https://github.com/laravel-honda/url-pattern-matcher/actions/workflows/formats.yml)
[![Version](https://poser.pugx.org/honda/url-pattern-matcher/version)](//packagist.org/packages/honda/url-pattern-matcher)
[![Total Downloads](https://poser.pugx.org/honda/url-pattern-matcher/downloads)](//packagist.org/packages/honda/url-pattern-matcher)
[![License](https://poser.pugx.org/honda/url-pattern-matcher/license)](//packagist.org/packages/honda/url-pattern-matcher)

Checks if a given path like (`/articles/4`) matches a given pattern like (`/articles/*`).

## Installation

You can install the package via composer:

```bash
composer require honda/url-pattern-matcher
```

## Usage

Trailing forward slashes are ignored so the matcher will match `/example`, `example`, `example/`, `/example/`  if given `/example`.

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

## Testing

There is 100% code coverage for this package, it's rare, most of the time useless, but it feels good :)

```bash
composer test
```

**Url Pattern Matcher** was created by **[Félix Dorn](https://twitter.com/afelixdorn)** under
the **[MIT license](https://opensource.org/licenses/MIT)**.
