# Negasus\NumeralSystem

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

```
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require negasus/numeralsystem
```

## Usage

``` php
$numeralSystem = new Negasus\NumeralSystem();
echo $numeralSystem->encode(1048576);
// See: 4OmW
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/negasus/numeralsystem.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/negasus/numeralsystem/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/negasus/numeralsystem.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/negasus/numeralsystem.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/negasus/numeralsystem.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/negasus/numeralsystem
[link-travis]: https://travis-ci.org/negasus/numeralsystem
[link-scrutinizer]: https://scrutinizer-ci.com/g/negasus/numeralsystem/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/negasus/numeralsystem
[link-downloads]: https://packagist.org/packages/negasus/numeralsystem
[link-author]: https://github.com/negasus
