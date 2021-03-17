<?php

namespace Honda\UrlPatternMatcher;

class UrlPatternMatcher
{
    public string $url;

    public function __construct(string $url)
    {
        $this->url = trim($url, '/');
    }

    public function match(string $pattern): bool
    {
        if (str_starts_with($pattern, '^')) {
            $pattern = substr($pattern, 1);

            return str_starts_with($this->url, trim($pattern));
        }

        if (str_ends_with($pattern, '$')) {
            $pattern = substr($pattern, 0, -1);

            return str_ends_with($this->url, trim($pattern));
        }

        return fnmatch(trim($pattern), $this->url);
    }
}
