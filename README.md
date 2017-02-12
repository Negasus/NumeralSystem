# Negasus\NumeralSystem

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

Code and decode numbers with any numeral system.

Bin, Hex, your numeral systems with custom alphabet!

More info in [wiki][link-wiki]


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
$numeralSystem = new Negasus\NumeralSystem(); // Default alphabet
echo $numeralSystem->encode(1048576); // see: 4OmW

$numeralSystem->setAlphabet($numeralSystem::ALPHABET_HEX);
echo $numeralSystem->encode(172224397); // see: A43EF8D

$numeralSystem->setAlphabet('AbCd');
echo $numeralSystem->encode(172224397); /see: CCbAAddCddCAdb
```

More info in [wiki][link-wiki]
## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/negasus/numeral-system.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Negasus/NumeralSystem/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/negasus/numeralsystem.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/negasus/numeral-system
[link-travis]: https://travis-ci.org/Negasus/NumeralSystem
[link-downloads]: https://packagist.org/packages/negasus/numeralsystem
[link-author]: https://github.com/negasus
[link-wiki]: https://github.com/Negasus/NumeralSystem/wiki
