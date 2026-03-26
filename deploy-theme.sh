#!/bin/bash
set -e

# Configuration
REPO_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
THEME_DIR="/var/www/kaymera.com/wp-content/themes/Kaymera"

echo "Deploying theme from $REPO_DIR to $THEME_DIR..."

# 1. Sync files (excluding git artifacts and the script itself)
# We use --delete to remove files in destination that are not in source
sudo rsync -av --delete \
    --exclude='.git' \
    --exclude='deploy-theme.sh' \
    "$REPO_DIR/themes/Kaymera/" "$THEME_DIR/"

# 2. Set ownership to the web server user
echo "Setting ownership to www-data:www-data..."
sudo chown -R www-data:www-data "$THEME_DIR"

# 3. Set standard WordPress permissions
echo "Setting directory permissions to 755 and file permissions to 644..."
sudo find "$THEME_DIR" -type d -exec chmod 755 {} \;
sudo find "$THEME_DIR" -type f -exec chmod 644 {} \;

echo "Deployment complete and permissions verified."
