#!/bin/bash
set -e

cd `dirname $0`

if which docker >/dev/null; then
  docker exec -it mywebsite_wpdb_1 sh -c 'mysqldump --all-databases -p$MYSQL_ROOT_PASSWORD' \
    > dump.sql
else
  echo Not doing db backup, we assume it is done in kubernetes cronjob
  echo 'https://github.com/svlentink/myinfra/blob/master/namespaces/wordpress/job.yml'
fi

if [[ -n "$(git status -s)" ]]; then
  git add .
  git commit -m `date +%F`
  git push 
fi

