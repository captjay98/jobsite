FROM php:8.3-apache

RUN apt-get update && \
    apt-get install -y git libzip-dev unzip nodejs npm libpq-dev && \
    rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN useradd -ms /bin/bash newuser

WORKDIR /var/www/html/jobsite
RUN chown -R www-data:www-data /var/www/html/
COPY --chown=www-data:www-data . .

RUN composer install --no-interaction --optimize-autoloader && composer clear-cache
RUN npm install && npm run build && npm cache clean --force
RUN composer dump-autoload --optimize

RUN chown -R www-data:www-data /var/www/html/ \
    && ln -s /var/www/html/jobsite/storage/app/public  /var/www/html/jobsite/public/storage \
    && chown -R www-data:www-data /var/www/html/jobsite/public/storage \
    && chmod -R 775 /var/www/html

COPY 000-default.conf /etc/apache2/sites-enabled/000-default.conf


EXPOSE 8080
RUN  a2enmod rewrite

# RUN service apache2 restart

CMD ["apache2ctl", "-D", "FOREGROUND"]










































# FROM php:8.2-fpm
# RUN echo "RUNNING!!!!"
# ARG USERNAME=www-data

# WORKDIR /var/www/html/project

# RUN apt-get clean
# RUN apt-get update && \
#     apt-get install -y git libzip-dev unzip nodejs npm libpq-dev && \
#     rm -rf /var/lib/apt/lists/*
# RUN docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl


# USER $USERNAME
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
#     composer install --no-interaction --optimize-autoloader && \
#     composer clear-cache

# RUN npm install && npm run build && npm cache clean --force
# RUN composer dump-autoload --optimize

# USER root

# RUN chown -R ${USERNAME}:${USERNAME} /var/www/html
# COPY --chown=${USERNAME}:${USERNAME} . .
# RUN ln -s /var/www/html/project/storage/app/public /var/www/html/project/public/storage


# RUN php artisan cache:clear
# RUN php artisan config:clear
# RUN php artisan route:clear
# RUN php artisan route:list











# COPY --chown=${USERNAME}:${USERNAME} .env.production .env
# RUN apt-get clean
# RUN apt-get update && \
#     apt-get install -y git libzip-dev unzip nodejs npm libpq-dev && \
#     rm -rf /var/lib/apt/lists/*
# RUN docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
#     composer install --no-interaction --optimize-autoloader && \
#     composer clear-cache

# RUN npm cache clean --force
# USER $USERNAME
# RUN npm install && npm run build && npm cache clean --force
# RUN composer dump-autoload --optimize


# RUN php artisan cache:clear
# RUN php artisan config:clear
# RUN php artisan route:clear
# RUN php artisan route:list


# EXPOSE 80


# CMD [ "/entrypoint.sh" ]


# RUN chmod -R 775 /var/www/html/public/storage/
# RUN chmod -R 775 /var/www/html/jobsite/bootstrap/cache/

# COPY --chown=${USERNAME}:${USERNAME} ./.env.production /var/www/html/project

