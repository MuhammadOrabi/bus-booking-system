docker run --rm --interactive --tty -v $(pwd):/app composer install

cp .env.example .env

./vendor/bin/sail up -d
