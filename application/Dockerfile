FROM garlic/base

MAINTAINER Maksym Churkyn <imaximius@gmail.com>

 # Set timezone
RUN echo Europe/Kiev >/etc/timezone \
    && ln -snf /usr/share/zoneinfo/Europe/Kiev /etc/localtime && echo Europe/Kiev > /etc/timezone \
    && echo 'date.timezone=Europe/Kiev' >> /usr/local/etc/php/conf.d/timezone.ini

# Make alias for Console
RUN echo 'alias sf="php bin/console"' >> ~/.bashrc

# Copy the project
COPY . /var/www/

# Run Composer install
RUN mkdir -p /var/www/vendor \
 && cd /var/www/ \
 && composer install --no-dev --no-suggest --no-progress 2>&1

WORKDIR /var/www/

# Add entrypoint
ADD start.sh .
RUN chmod +x start.sh

CMD ["/bin/bash", "start.sh"]