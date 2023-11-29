FROM nginx:latest
RUN echo "NGINXXX"
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf
ARG USERNAME=nginx

WORKDIR /var/www/html/project

RUN apt-get clean
RUN apt-get update && \
    apt-get install -y git libzip-dev unzip nodejs npm libpq-dev && \
    rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl


USER $USERNAME
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-interaction --optimize-autoloader && \
    composer clear-cache

RUN npm install && npm run build && npm cache clean --force
RUN composer dump-autoload --optimize

USER root

RUN chown -R ${USERNAME}:${USERNAME} /var/www/html
COPY --chown=${USERNAME}:${USERNAME} . .
RUN ln -s /var/www/html/project/storage/app/public /var/www/html/project/public/storage


RUN php artisan cache:clear
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan route:list










# RUN chown -R ${USERNAME}:${USERNAME} .
# COPY --chown=${USERNAME}:${USERNAME} . .
# RUN ln -s /var/www/html/project/storage/app/public /var/www/html/project/public/storage
# COPY --chown=${USERNAME}:${USERNAME} .env.production .env

# RUN php artisan cache:clear
# RUN php artisan config:clear
# RUN php artisan route:clear
# RUN php artisan route:list





# WORKDIR /var/www/html/project

# COPY composer.json composer.lock /var/www/jobsite/
# COPY package.json package-lock.json  /var/www/jobsite/

# RUN apt-get clean
# RUN apt-get update && \
#     apt-get install -y git libzip-dev unzip nodejs npm libpq-dev && \
#     rm -rf /var/lib/apt/lists/*
# RUN docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
#     composer install --no-interaction --optimize-autoloader && \
#     composer clear-cache

# RUN npm install && npm run build && npm cache clean --force
# RUN composer dump-autoload --optimize
# RUN chown -R ${USERNAME}:${USERNAME} /var/www/html
# COPY --chown=${USERNAME}:${USERNAME} . /var/www/html/project
# COPY --chown=${USERNAME}:${USERNAME} ./.env.production /var/www/html/project
# RUN ln -s /var/www/html/project/storage/app/public /var/www/html/project/public/storage

# RUN php artisan cache:clear
# RUN php artisan config:clear
# RUN php artisan route:clear
# RUN php artisan route:list



# USER $USERNAME



























# RUN apt-get update && apt-get install -y build-essential libzip-dev libpng-dev \
#     libpq-dev libjpeg62-turbo-dev libfreetype6-dev \
#     locales zip jpegoptim optipng pngquant \
#     gifsicle vim unzip git curl libzip-dev npm nodejs
# RUN apt-get clean && rm -rf /var/lib/apt/lists/*




# USER root


# RUN  mkdir -p /home/$USERNAME && chown $USERNAME:$USERNAME /home/$USERNAME \
#     && usermod -o -u $HOST_UID $USERNAME -d /home/$USERNAME \
#     && groupmod -o -g $HOST_GID $USERNAME \
#     && chown -R ${USERNAME}:${USERNAME} /var/www/html

# USER ${USERNAME}



# WORKDIR /var/www/html/project
# COPY . /var/www/html/project
# COPY ./.env /var/www/html/project
# RUN chown -R nginx:nginx /var/www/html/
# RUN chmod -R 775 /var/www/html/
# RUN ln -s /var/www/html/project/storage/app/public /var/www/html/project/public/storage
# RUN chmod -R 775 /var/www/html/project/public/storage/
# RUN chmod -R 775 /var/www/html/project/bootstrap/cache/





# FROM nginx:alpine
# COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf
# RUN echo "NGINXXX"
# WORKDIR /var/www/html/project
# COPY . /var/www/html/project
# COPY ./.env /vaw/www/html/project
# RUN cp -r /var/www/html/project/public/* /var/www/html/
# RUN ln -s /var/www/html/project/storage/app/public /var/www/html/storage
# RUN chown -R nginx:nginx /var/www/html/
# RUN chmod -R 775 /var/www/html/



# RUN cp -r /var/www/html/project/public /var/www/html/
# RUN ln -s /var/www/html/project/storage/app/public /var/www/html/public/storage
# RUN rm      /var/www/html/project/public/index.php
