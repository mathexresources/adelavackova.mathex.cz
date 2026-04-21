#!/bin/bash

# Path to the album image folders
ALBUM_PATH="/home/matt/PhpstormProjects/tadeasPortfolio/www/img/albums"

# List all numbered directories
# Ensure curl exists
command -v curl >/dev/null 2>&1 || { echo "curl is required but not installed. Aborting."; exit 1; }

cd "$ALBUM_PATH" || exit 1

for dir in [0-9]*; do
  echo "Processing album: $dir"
  cd "$dir" || continue

  # Download thumbnail.jpg (500x300)
  echo " - Downloading thumbnail.jpg"
  curl -s -L "https://picsum.photos/seed/thumb$dir/500/300" -o "thumbnail.jpg"

  # Number of random images (5-15)
  count=$((RANDOM % 11 + 5))

  for i in $(seq 1 $count); do
    width=$((RANDOM % 800 + 400))     # 400 - 1200px
    height=$((RANDOM % 600 + 300))    # 300 - 900px
    echo " - Downloading $i.jpg (${width}x${height})"
    curl -s -L "https://picsum.photos/seed/${dir}_${i}/${width}/${height}" -o "${i}.jpg"
  done

  cd ..
done

echo "✅ All album images downloaded."
