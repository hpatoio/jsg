## Coding Standards

Once you are done with your changes run 

```
docker run --rm -v `pwd`:/var/jsg jsg vendor/bin/ecs check src --no-progress-bar -vvv --fix
```

to fix all coding standards issues before opening a PR.

## Tests

To run all the tests use

```
docker run --rm -v `pwd`:/var/jsg jsg vendor/bin/phpunit
```