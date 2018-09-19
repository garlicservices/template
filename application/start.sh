#!/usr/bin/env bash

printenv | awk '{split($0,m,"="); print "export "m[1]"=\""m[2]"\""}' >> /root/.bashrc

composer install

php /var/www/bin/console d:d:c --if-not-exists && \
php /var/www/bin/console d:s:u --force && \
cp supervisor.conf /etc/supervisor/conf.d/ && \
supervisord
