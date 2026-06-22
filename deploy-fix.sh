#!/bin/bash
# ZMsite deployment fix and plugin activation script

echo "=== 1. Stopping running containers & clearing existing DB volume ==="
# Stop containers and remove volume to force database re-import
docker-compose down -v

echo "=== 2. Starting containers in background ==="
docker-compose up -d

echo "=== 3. Waiting for MySQL database to initialize (25 seconds) ==="
sleep 25

echo "=== 3.5. Disabling WP Cron loopback requests to prevent loading hangs ==="
docker exec -t zm-wordpress sed -i "s/<?php/<?php\ndefine('DISABLE_WP_CRON', true);/" /var/www/html/wp-config.php

echo "=== 4. Running serialization-safe DB search-and-replace ==="
# Safe search-and-replace for domain placeholders (including serialized arrays)
docker exec -t zm-wordpress php /var/www/html/wp-content/db-search-replace.php

echo "=== 5. Activating plugins (ACF, Polylang, Contact Form 7) ==="
# Execute the php helper script inside the wordpress container
docker exec -t zm-wordpress php /var/www/html/wp-content/activate-plugins.php

echo "=== 6. Re-generating rewrite rules ==="
# Touch the config to ensure rewrite rules are refreshed
docker exec -t zm-wordpress touch /var/www/html/wp-content/themes/zhongming-theme/functions.php

echo "=== 7. Running Server Diagnostics ==="
docker exec -t zm-wordpress php /var/www/html/wp-content/diagnose.php

echo "=== Fix Completed! Please check http://43.133.36.40:8001 ==="
