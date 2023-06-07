FROM php:7.2-apache

RUN a2enmod rewrite

COPY ./ /var/www/html/

RUN apt-get update -y && apt-get install -y libmariadb-dev

RUN docker-php-ext-install mysqli

RUN apt-get update -y && apt-get install -y sendmail libpng-dev

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev 

RUN docker-php-ext-install mbstring

RUN docker-php-ext-install zip

RUN docker-php-ext-install gd

RUN chmod 777 -R /var/www/html/