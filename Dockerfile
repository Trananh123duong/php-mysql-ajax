FROM php:8.1-apache

# Cài đặt các extension PHP cần thiết
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Kích hoạt mod_rewrite của Apache
RUN a2enmod rewrite

# Copy mã nguồn PHP
COPY src/ /var/www/html/

# Đặt quyền sở hữu
RUN chown -R www-data:www-data /var/www/html

# Đặt thư mục làm việc
WORKDIR /var/www/html
