FROM ubuntu

LABEL title="apache-lamp" \
  author="Asir"
  
# para que no te pregunte durante la instalacion
ENV DEBIAN_FRONTEND=noninteractive 
ENV TZ=Europe/Madrid

# && hace k si un comando peta no siga instalando
RUN apt-get update \
    && apt-get install -y apache2 \
    && apt-get install -y php \
    && apt-get install -y libapache2-mod-php \
    && apt-get install -y php-mysql \
    && cd /var/www/html \
    && apt-get install -y wget \
    && wget https://github.com/vrana/adminer/releases/download/v4.3.1/adminer-4.3.1-mysql.php \
    && mv adminer-4.3.1-mysql.php adminer.php

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

EXPOSE 80

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]