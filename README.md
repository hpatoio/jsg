# JSON Schema generator

[![Continuous Integration](https://github.com/hpatoio/jsg/workflows/PHPUnit%20tests/badge.svg)](https://github.com/hpatoio/jsg/actions)

## Installation

Install the package in your project with

```
composer require hpatoio/jsg
```

## Create dev environment

1) Clone the repo

```
git clone git@github.com:hpatoio/jsg.git
cd jsg
```

2) Build the image

```
docker build -t jsg .docker
```

3) Run `composer install` to get dependencies

```
docker run --rm -v `pwd`:/var/jsg jsg composer install
```

## Run tests 

```
docker run --rm -v `pwd`:/var/jsg jsg vendor/bin/phpunit
```

## Fix CS

```
docker run --rm -v `pwd`:/var/jsg jsg vendor/bin/ecs check src --no-progress-bar -vvv --fix
```

## License

This package is licensed using the MIT License.