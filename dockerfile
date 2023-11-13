FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql && a2enmod rewrite

RUN apt-get update && \
    apt-get install -y git libzip-dev unzip nodejs npm && \
    rm -rf /var/lib/apt/lists/*


COPY . /var/www/html/jobsite
WORKDIR /var/www/html/jobsite

RUN echo "CURRENT WORKING DIRECTORY"
RUN ls
RUN pwd
RUN echo "CURRENT WORKING DIRECTORY"

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-interaction --optimize-autoloader && \
    composer clear-cache

RUN npm install && npm run build && npm cache clean --force

RUN composer dump-autoload --optimize


RUN chown -R www-data:www-data /var/www/html/jobsite/
RUN chmod -R 755 /var/www/html/jobsite/


RUN chmod -R 775 /var/www/html/jobsite

RUN chmod -R 775 /var/www/html/jobsite/storage

RUN chmod -R 775 /var/www/html/jobsite/bootstrap/cache


RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan route:cache
# RUN php artisan key:generate
# RUN php artisan migrate
# RUN php artisan db:seed


ENV APACHE_SERVER_NAME=localhost
RUN echo "ServerName $APACHE_SERVER_NAME" >> /etc/apache2/apache2.conf

RUN echo "DirectoryIndex jobsite/public/index.php" >> /etc/apache2/apache2.conf

# RUN echo "DocumentRoot /var/www/html/public" >> /etc/apache2/apache2.conf

# RUN service apache2 restart

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]




