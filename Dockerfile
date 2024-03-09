FROM php:8.2-fpm

# Установка зависимостей для mysqli
RUN apt-get update && apt-get install -y \
    libzip-dev \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli \
    && apt-get clean
    
COPY . /var/www/html

WORKDIR /var/www/html

EXPOSE 80

CMD ["php-fpm"]