FROM php:7.4-cli
WORKDIR /var/www

# Install composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
  php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
  rm -rf composer-setup.php

# Install Protobuf Compiler for generating PHP classes
RUN apt update && apt install -y protobuf-compiler zip

# Compile all .proto files into PHP classes
COPY . /var/www
RUN mkdir build && protoc --proto_path=proto --php_out=build proto/example.proto

# Install PHP dependencies
RUN composer install

CMD [ "/usr/local/bin/php", "./src/index.php" ]