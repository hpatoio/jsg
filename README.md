This is a scaffold to start a new PHP project


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
docker build -t musement-my-project .docker
```

3) Run `composer install` to get dependencies

```
docker run --rm -v `pwd`:/var/musement-my-project musement-my-project composer install
```

## Run tests 

```
docker run --rm -v `pwd`:/var/musement-my-project musement-my-project vendor/bin/phpunit
```

## Fix CS

```
docker run --rm -v `pwd`:/var/musement-my-project musement-my-project vendor/bin/ecs check src --no-progress-bar -vvv --fix
```

## License

This package is licensed using the MIT License.