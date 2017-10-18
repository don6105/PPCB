#!/bin/bash

WEB_PATH="/var/www/html"
DB_USER="root"
DB_PWD="ppcb5994"

# web environment setting
apt-get install mysql-server apache2 php -y
cp ./PPCB -R ${WEB_PATH}/PPCB
chown -R www-data:www-data ${WEB_PATH}/PPCB
chmod -R 755 ${WEB_PATH}/PPCB

# apache mod rewrite
a2enmod rewrite
new="<Directory /var/www/html/PPCB>\n\tOptions FollowSymLinks\n\tAllowOverride All\n</Directory>"
line=`grep -n "#<Directory" apache2.conf | cut -d ":" -f 1`
sed $line"i$new" apache2.conf > ./apache2.conf.tmp
mv /etc/apache2/apache2.conf /etc/apache2/apache2.conf.bak
mv ./apache2.conf.tmp /etc/apache2/apache2.conf
/etc/init.d/apache2 restart

# database source
mv ./*.sql ./PPCB.sql
mysql --user="$DB_USER" --password="$DB_PWD" --database=PPCB --execute="source PPCB.sql"
