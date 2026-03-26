#!/bin/bash
set -e

# Configuration
REPO_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
THEME_DIR="/var/www/kaymera.com/wp-content/themes/Kaymera"

echo "Deploying theme from $REPO_DIR to $THEME_DIR..."

# 1. Pull latest changes
cd "$REPO_DIR"
# If we're already in the repo, we just make sure we are synced
# git pull origin master # Optional depending on how you run it

# 2. Copy files (excluding git artifacts and the script itself)
sudo rsync -av --delete --exclude='.git' --exclude='deploy-theme.sh' "$REPO_DIR/themes/Kaymera/" "$THEME_DIR/"

# 3. Set permissions
sudo chown -R wordpress:www-data "$THEME_DIR"
sudo chmod -R 755 "$THEME_DIR"

echo "Deployment complete."
