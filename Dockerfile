FROM phpmyadmin/phpmyadmin

RUN curl   https://raw.githubusercontent.com/creationix/nvm/v0.25.0/install.sh | bash
# RUN source ~/.profile
RUN ["/bin/bash", "-c", "source ~/.profile"]

CMD echo "ServerName localhost" >> /etc/apache2/conf-available/docker-php.conf | sed -i '69s/#ServerRoot/ServerRoot/' /etc/apache2/apache2.conf | source /etc/apache2/envvars

