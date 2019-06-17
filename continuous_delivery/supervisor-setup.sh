#!/usr/bin/env bash


N="maratona-worker"

if ! [ -x "$(command -v supervisorctl)" ]; then
  echo 'Error: Supervisor is not installed.' >&2
  exit 1
else
  sudo echo "[program:${N}]
  process_name=%(program_name)s_%(process_num)02d
  command=php ${PWD}/artisan queue:work sqs --sleep=3 --tries=3
  autostart=true
  autorestart=true
  user=www-data
  numprocs=1
  redirect_stderr=true
  stdout_logfile=${PWD}/storage/logs/worker.log" | sudo tee /etc/supervisor/conf.d/$N.conf
  sudo supervisorctl reread
  sudo supervisorctl update
  sudo supervisorctl start ${N}:*
fi