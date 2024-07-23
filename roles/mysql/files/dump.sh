#!/bin/bash

BACKUP_DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_FILE="$MYSQL_DATABASE"_"$BACKUP_DATE.sql"

# Создание резервной копии базы данных
mysqldump -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE" > "$BACKUP_FILE"
