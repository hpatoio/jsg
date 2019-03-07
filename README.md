
[![Build Status](https://api.travis-ci.org/hpatoio/phpstan-rules.svg?branch=master)](https://travis-ci.com/hpatoio/phpstan-rules)
[![Latest Stable Version](https://poser.pugx.org/hpatoio/phpstan-rules/v/stable)](https://packagist.org/packages/hpatoio/phpstan-rules)
[![Total Downloads](https://poser.pugx.org/hpatoio/phpstan-rules/downloads)](https://packagist.org/packages/hpatoio/phpstan-rules)

This package contains a PHPstan rules that check that in all classes under given namespace only exception under a specific namespace are thrown.

## Installation

Install the package in your project with

```
composer require --dev musement/phpstan-rules
```

## Usage

Include `rules.neon` in your `phpstan.neon`:

```neon
includes:
	- vendor/musement/phpstan-rules/rules.neon
```

and configure `sourceNamespace` and `allowedExceptionNamespace`

```
    sourceNamespace: Here\The\Source\Namespace
    allowedExceptionNamespace: Here\The\Allowed\Exception\Namespace
```

## Create dev environment

1) Clone the repo

```
git clone git@bitbucket.org:musementcom/phpstan-rules.git
```

2) Build the image

```
docker build -t musement-phpstan .docker
```

3) Run `composer install` to get dependencies

```
docker run --rm -v `pwd`:/var/musement-phpstan musement-phpstan composer install
```

## License

This package is licensed using the MIT License.

## Credits

The structure of this package was inspired by https://github.com/localheinz/phpstan-rules/