#!/bin/bash
set -e

cd /root/wordpress-backup
if [[ -n "$(git status -s)" ]]; then
  git add .
  git commit -m `date +%F`
  git push 
fi

