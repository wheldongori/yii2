FROM yiisoftware/yii2-php:7.2-apache

# RUN apt-get update && apt-g
# COPY apache2.conf /etc/apache2
# RUN docker-php-ext-install mysqli pdo pdo_mysql
# RUN docker-php-ext-configure pdo_mysql 
# RUN docker-php-ext-configure pdo 
# COPY .docker/vhost.conf  /opt/lampp/etc/extra/httpd-vhosts.conf
# Change document root for Apache
RUN sed -i -e 's|/app/web|/app/backend/web|g' /etc/apache2/sites-available/000-default.conf