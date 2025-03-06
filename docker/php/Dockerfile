FROM php:8.2-fpm

RUN apt-get update \
    && apt-get install -y git yamllint mc librabbitmq-dev \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-enable zip

RUN docker-php-ext-install \
    bcmath pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ARG USER_ID=1000
ARG GROUP_ID=1000
RUN groupmod -g ${GROUP_ID} www-data && \
    usermod -u ${USER_ID} www-data

# files
RUN chown www-data:www-data /var/www
COPY --chown=www-data:www-data ./ /app
WORKDIR /app

USER www-data

CMD php-fpm