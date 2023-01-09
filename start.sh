#Start the containers
docker compose up --build --force-recreate -d

#Import content
# docker exec army-composer-php-1 bash -c "php bin/console make:migration"
# yes | docker exec army-composer-php-1 bash -c "php bin/console doctrine:migrations:migrate --all-or-nothing"