FROM php:5.6-apache
ADD ./ /var/www/html
RUN apt-get update && apt-get install -y libfreetype6-dev
EXPOSE 8080
