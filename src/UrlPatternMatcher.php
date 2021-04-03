<?php

namespace Honda\UrlPatternMatcher;

class UrlPatternMatcher
{
    public const PATTERN_IS_WILDCARD         = 1;
    protected const PATTERN_CHECKS_BEGINNING = 2;
    protected const PATTERN_CHECKS_ENDING    = 4;

    protected int $type;
    protected string $pattern;

    public function __construct(string $pattern)
    {
        $this->type    = $this->getPatternType($pattern);
        $this->pattern = $this->getTrimmedPattern($pattern);
    }

    protected function getPatternType(string $pattern): int
    {
        $flags = 0;

        if (str_starts_with($pattern, '^')) {
            $flags = $flags | static::PATTERN_CHECKS_BEGINNING;
        }

        if (str_ends_with($pattern, '$')) {
            $flags = $flags | static::PATTERN_CHECKS_ENDING;
        }

        if (str_contains($pattern, '?') || str_contains($pattern, '*')) {
            $flags = $flags | static::PATTERN_IS_WILDCARD;
        }

        return $flags;
    }

    protected function getTrimmedPattern(string $pattern): string
    {
        if (str_starts_with($pattern, '^')) {
            $pattern = substr($pattern, 1);
        }

        if (str_ends_with($pattern, '$')) {
            $pattern = substr($pattern, 0, -1);
        }

        return trim($pattern, "/ \t\n\r\0\x0B");
    }

    public function match(?string $url): bool
    {
        $url = trim($url ?? '', '/');

        if (empty($url)) {
            return false;
        }

        if ($url === $this->pattern) {
            return true;
        }

        if ($this->type & static::PATTERN_IS_WILDCARD) {
            return fnmatch($this->pattern, $url);
        }

        if ($this->type & static::PATTERN_CHECKS_BEGINNING) {
            return str_starts_with($url, $this->pattern);
        }

        if ($this->type & static::PATTERN_CHECKS_ENDING) {
            return str_ends_with($url, $this->pattern);
        }

        return false;
    }
}
