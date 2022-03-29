## PHP Docker Start
A repository to clone and start your php, laravel or lumem projects in docker!
Configured by a docker-compose file with everthing you need to start a PHP 8 project!

### Containers
 - PHP 8.0.12 FPM
 - MySQL
 - Nginx

### Requirements
Only docker and docker-compose installed =)

### Getting Starting
 1. Setup docker/database/.env file with yours optional credentials
 2. Run docker-compose up command
 3. Done!

 ### Run
 docker-compose up -d

### Exec commands
docker-compose exec php bash

### Down container 
docker-compose down

### mysql
if you have a local mysql you ĺ will need to stop the service!
in ubuntu: sudo systemctl stop mysql