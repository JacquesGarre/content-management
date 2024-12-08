#!/bin/bash

composer install

docker exec -it php-service php bin/console c:c
docker exec -it php-service php bin/console d:m:m

docker compose watch