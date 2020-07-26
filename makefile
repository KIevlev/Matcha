docker_php = camagru_php-fpm_1
docker_nginx = camagru_nginx_1
docker_mysql = camagru_mysql_1

#some commands
start: #Containers start
	@sudo docker-compose up -d

stop: #Stop
	@sudo docker-compose stop

show_containers:
	@sudo docker ps

php:
	@sudo docker exec -it $(docker_php) bash

nginx1:
	@sudo docker exec -it $(docker_nginx) bash

mysql:
	@sudo docker exec -it $(docker_mysql) bash
