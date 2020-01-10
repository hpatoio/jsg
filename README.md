# JSON Schema generator

This package let you represent a JSON Schema as a PHP object and dump it as a JSON and vice versa.

[![Continuous Integration](https://github.com/hpatoio/jsg/workflows/PHPUnit%20tests/badge.svg)](https://github.com/hpatoio/jsg/actions)

[![codecov](https://codecov.io/gh/hpatoio/jsg/branch/master/graph/badge.svg)](https://codecov.io/gh/hpatoio/jsg)

## Usage

#### Create a JSON from a model

1. Define the model representing the schema.
    ```php
    $myJsonSchema = new JsonSchema('foo', 'My schema', "Test schema description", ...[
            new OptionalObjectProperty(new TypeBoolean("top", "Is a top developer ?")),
            new RequiredObjectProperty(new TypeDate("birthdate", "Birthdate ?")),
            new OptionalObjectProperty(new TypeDateTime("interview_at", "Interview planned for ?")),
            new RequiredObjectProperty(new TypeEmail("email", "Email address ?")),
            new RequiredObjectProperty(TypeInteger::from(100, "minimum_salary", "Minimum salary ?")),
            new OptionalObjectProperty(TypeInteger::to(200, "max_days_in_office", "Max number of days in office ?")),
            new OptionalObjectProperty(new TypeObject("address", "Address", ...[
                new OptionalObjectProperty(TypeString::withMinLength("street", "Street", 0)),
                new OptionalObjectProperty(TypeString::withMinLength("city", "City", 0))
            ]))
        ]);
    ```

1. Serialize the object into a JSON.
    ```php
    echo JsonSchemaGenerator::generate($myJsonSchema);
    ```
    the result will be a JSON like https://github.com/hpatoio/jsg/blob/develop/test/fixtures/all-types-schema.json

#### Create a model from a JSON

1. Generate the model from a JSON
    ```php
    $hydratedSchema = JsonSchemaHydrator::hydrate("/path/to/the/file.json");
    ```
1. Access elements
    ```php
    $hydratedSchema->getProperties()['id_of_the_property'];
    ```
    
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

## Run mutation tests

```
docker run --rm -v `pwd`:/var/jsg jsg ./infection.phar run
```

## Fix CS

```
docker run --rm -v `pwd`:/var/jsg jsg vendor/bin/ecs check src --no-progress-bar -vvv --fix
```

## License

This package is licensed using the MIT License.