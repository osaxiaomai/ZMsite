#!/bin/bash
# ZMsite deployment fix and plugin activation script

echo "=== 1. Stopping running containers & clearing existing DB volume ==="
# Stop containers and remove volume to force database re-import
docker-compose down -v

echo "=== 2. Replacing domain placeholders in SQL file ==="
# Replace placeholders with http://43.133.36.40:8001
sed -i 's|https://\[PRODUCTION_DOMAIN\]|http://43.133.36.40:8001|g' db_init/zhongming-local.sql
sed -i 's|http://zhongming.local|http://43.133.36.40:8001|g' db_init/zhongming-local.sql

echo "=== 3. Starting containers in background ==="
docker-compose up -d

echo "=== 4. Waiting for MySQL database to initialize (20 seconds) ==="
sleep 20

echo "=== 5. Activating plugins (ACF Pro, Polylang, Contact Form 7) ==="
# Execute the php helper script inside the wordpress container
docker exec -t zm-wordpress php /var/www/html/wp-content/activate-plugins.php

echo "=== 6. Re-generating rewrite rules ==="
# Touch the config to ensure rewrite rules are refreshed
docker exec -t zm-wordpress touch /var/www/html/wp-content/themes/zhongming-theme/functions.php

echo "=== Fix Completed! Please check http://43.133.36.40:8001 ==="
