#!/bin/sh
chown -R www-data:www-data /var/www/html/www/img
exec "$@"