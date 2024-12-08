#!/bin/bash

composer install
docker-compose up --build

docker exec -it php-service php bin/console c:c
docker exec -it php-service php bin/console d:m:m

echo " ✔ App running at http://localhost:8000"
