FROM yiisoftware/yii2-php:7.2-apache

# RUN docker-php-ext-configure pdo_mysql 
# RUN docker-php-ext-configure pdo 

# COPY 000-default.conf /etc/apache2/sites-available/

# Change document root for Apache 
RUN sed -i -e 's|/app/web|/app/frontend/web|g' /etc/apache2/sites-available/000-default.conf
# RUN sed -i -e 's|127.0.0.1|mysql|g' /etc/hosts
# RUN sed -i -e 's|127.0.0.1|mysql|g' /app/common/config/main-local.php