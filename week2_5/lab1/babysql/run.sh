#!/bin/sh
service mysql start
service ssh start
FLAG='flag{215f51da-f88a-11ec-b939-0242ac120002}'
mysqladmin -u root password root
mysql -e "CREATE DATABASE IF NOT EXISTS news;USE news; use news;source /ctf.sql;" -uroot -proot
mysql -uroot -proot -e "create user '629ae1daeec50'@'localhost' identified with mysql_native_password by '629ae1e411ae0';"
mysql -uroot -proot -e "grant all privileges on *.* to '629ae1daeec50'@'localhost';"
mysql -uroot -proot -e "FLUSH PRIVILEGES;"
echo $FLAG >/flag
service apache2 start
rm -f /ctf.sql
tail -F /dev/null
