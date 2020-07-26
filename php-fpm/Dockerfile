FROM php:7.2.2-fpm

ENV TIMEZONE Europe/Moscow

RUN apt-get update && \
    apt-get install -y \
#    && docker-php-ext-configure gd --with-jpeg-dir=DIR --with-freetype-dir=DIR --with-png-dir=DIR \
#    && docker-php-ext-install -j$(nproc) gd
    msmtp \ 
	mysql-server \
    vsftpd \
    libpng-dev \
    libjpeg-dev \
    zlib1g-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev && \
	docker-php-ext-install exif mysqli pdo pdo_mysql && \
    docker-php-ext-enable mysqli &&\
    rm -rf /var/lib/apt/lists/* && \
    update-alternatives --install /usr/sbin/sendmail sendmail /usr/bin/msmtp 10


RUN docker-php-ext-configure gd \
    --with-webp-dir=/usr/include/  \
    --with-jpeg-dir=/usr/include/  \
    --with-png-dir=/usr/include/  \
    --with-freetype-dir=/usr/include/ \
    --with-gd && \
    docker-php-ext-install gd
 #       php7.2-gd \
#RUN docker-php-ext-install gd

COPY php.ini /usr/local/etc/php/

ADD msmtprc /etc/msmtprc
#ADD .msmtprc ~/.msmtprc
RUN chmod 0644 /etc/msmtprc
#RUN chmod 600 ~/.msmtprc

EXPOSE 20-21 30000-31000

#RUN openssl req -x509 -nodes -days 3650 -newkey rsa:2048 -keyout /etc/ssl/private/vsftpd.pem -out /etc/ssl/private/vsftpd.pem
#RUN ufw allow 20:21/tcp
#RUN ufw allow 30000:31000/tcp
#RUN ufw allow OpenSSH
#RUN ufw disable
#RUN ufw enable


WORKDIR "/var/www"
