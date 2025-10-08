#!/bin/bash


# Load .env file
set -o allexport
source .env
set +o allexport

case "$1" in
  db_dump)
    docker exec mariadb sh -c "exec mysqldump -uroot -p$MARIADB_ROOT_PASSWORD --all-databases"> mariadb-dump.sql
    ;;
  
  db_restore)
    docker exec -i mariadb \
      sh -c "exec mysql -uroot -p$MARIADB_ROOT_PASSWORD" < mariadb-dump.sql
    ;;
  db_list_users)
    docker exec -i mariadb mysql -uroot -p$MARIADB_ROOT_PASSWORD --table my_db -e "SELECT * FROM users;"
    ;;
  *)
    echo "Usage: $0 {db_dump|db_restore|db_list_users}"
    exit 1
    ;;
esac
