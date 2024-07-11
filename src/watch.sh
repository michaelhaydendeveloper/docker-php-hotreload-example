#!/bin/bash

# Watch PHP files recursively
inotifywait -m -r -e modify,move,create,delete /var/www/html \
| while read -r directory events filename; do
    echo "File change detected: $filename"
    # Add commands to clear caches, restart Apache, etc. as needed
    # For example, restart Apache:
    apache2ctl -k graceful
done
