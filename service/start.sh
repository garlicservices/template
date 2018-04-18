#!/usr/bin/env bash

printenv | awk '{split($0,m,"="); print "export "m[1]"=\""m[2]"\""}' >> /root/.bashrc

php /var/www/bin/console d:d:c --if-not-exists && \
php /var/www/bin/console d:s:u --force && \
php /var/www/bin/console swagger:export web/public/ -e dev --force && \
cp supervisor.conf /etc/supervisor/conf.d/ && \
supervisord
