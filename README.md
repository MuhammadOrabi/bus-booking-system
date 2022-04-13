## Run The project using sail

```
cd bus-booking-system

docker run --rm --interactive --tty -v $(pwd):/app composer install

cp .env.example .env

./vendor/bin/sail up -d
```

## documentation

https://documenter.getpostman.com/view/20473899/UVz1Nruc
