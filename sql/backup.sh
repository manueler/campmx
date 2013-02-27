#!/bin/sh
export backup_name=$(date +%Y%m%d%H%M)-dump-$USER.sql
mysqldump -ucamp -pcamp -h127.0.0.1 camp --opt > $backup_name
bzip2 -9 $backup_name
echo $backup_name
