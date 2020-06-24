FROM php:7.4-fpm

RUN docker-php-ext-configure pdo_mysql \
    && docker-php-ext-install -j$(nproc) pdo_mysql
    
RUN apt-get update && \
    apt-get install -y \
    msmtp && \
    update-alternatives --install /usr/sbin/sendmail sendmail /usr/bin/msmtp 10

COPY php.ini /usr/local/etc/php/

ADD msmtprc /etc/msmtprc
RUN chmod 0644 /etc/msmtprc

EXPOSE 9001

ADD wait-for-it.sh /
RUN chmod 555 /wait-for-it.sh

RUN mkdir -p /var/log/supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && \
      echo 2 | apt-get install -y postfix supervisor && \
      apt-get clean
