#!/bin/sh
echo "flag{happy_2_2022_Whu}" >/flag
service apache2 start
tail -F /dev/null
