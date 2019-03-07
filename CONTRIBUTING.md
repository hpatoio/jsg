## Coding Standards

Once you are done with your changes run 

```
docker run --rm -v `pwd`:/var/musement-phpstan musement-phpstan vendor/bin/ecs check src --fix
```

to fix all coding standards issues before opening a PR.

## Tests

To run all the tests use

```
docker run --rm -v `pwd`:/var/musement-phpstan musement-phpstan vendor/bin/phpunit
```