#!/bin/bash
set -e

cd /root/wordpress-backup
docker exec -it mywebsite_wpdb_1 sh -c 'mysqldump --all-databases -p$MYSQL_ROOT_PASSWORD' \
  > ~/wordpress-backup/dump.sql
if [[ -n "$(git status -s)" ]]; then
  git add .
  git commit -m `date +%F`
  git push 
fi

