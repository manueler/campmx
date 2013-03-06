#!/bin/sh
export backup_name=$(date +%Y%m%d%H%M)-dump-$USER.sql
mysqldump -usoftlite_campmx -pF1kiQuQpzMrU -h127.0.0.1 softlite_campmx --opt > $backup_name
bzip2 -9 $backup_name
echo $backup_name
