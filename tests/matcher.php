<?php

use Honda\UrlPatternMatcher\UrlPatternMatcher;

it('can match the URL', function () {
    $matcher = new UrlPatternMatcher('/hello/world');

    expect($matcher->match('/hello/world'))->toBeTrue();
    expect($matcher->match('hello/world'))->toBeTrue();
    expect($matcher->match('hello/world/'))->toBeTrue();
    expect($matcher->match('/hello/world/'))->toBeTrue();
    expect($matcher->match('something/else'))->toBeFalse();
    expect($matcher->match('helloworld'))->toBeFalse();
});

it('can match the URL with wildcard in pattern', function () {
    $matcher = new UrlPatternMatcher('/articles/*/edit');

    expect($matcher->match('/articles/4/edit'))->toBeTrue();
    expect($matcher->match('/articles/4/edit/'))->toBeTrue();
    expect($matcher->match('articles/4/edit/'))->toBeTrue();
    expect($matcher->match('articles/4/edit'))->toBeTrue();
});

it('can match the URL with unknown entity in pattern', function () {
    $matcher = new UrlPatternMatcher('/articles/?/edit');

    expect($matcher->match('/articles/2/edit'))->toBeTrue();
    expect($matcher->match('/articles/2/edit/'))->toBeTrue();
    expect($matcher->match('articles/2/edit/'))->toBeTrue();
    expect($matcher->match('articles/2/edit'))->toBeTrue();
});

it('can match the URL from the beginning', function () {
    $matcher = new UrlPatternMatcher('^/articles');

    expect($matcher->match('/articles'))->toBeTrue();
    expect($matcher->match('/articles/'))->toBeTrue();
    expect($matcher->match('articles/'))->toBeTrue();
    expect($matcher->match('articles'))->toBeTrue();
});

it('can match the URL from the end', function () {
    $matcher = new UrlPatternMatcher('/articles$');

    expect($matcher->match('/dashboard/articles'))->toBeTrue();
    expect($matcher->match('/dashboard/articles/'))->toBeTrue();
    expect($matcher->match('dashboard/articles/'))->toBeTrue();
    expect($matcher->match('dashboard/articles'))->toBeTrue();
});

it('returns false if the URL is null', function () {
    $matcher = new UrlPatternMatcher('/hello');
    expect($matcher->match(null))->toBeFalse();

    $matcher = new UrlPatternMatcher('^/hello');
    expect($matcher->match(null))->toBeFalse();

    $matcher = new UrlPatternMatcher('/hello$');
    expect($matcher->match(null))->toBeFalse();

    $matcher = new UrlPatternMatcher('/*');
    expect($matcher->match(null))->toBeFalse();
});

it('returns true if the URL is /', function () {
    $matcher = new UrlPatternMatcher('/');
    expect($matcher->match('/'))->toBeTrue();
});
