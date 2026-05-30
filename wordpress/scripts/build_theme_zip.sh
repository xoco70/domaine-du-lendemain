#!/usr/bin/env bash
#
# Génère le zip installable du thème « Domaine du Lendemain » dans
# wordpress/dist/domaine-du-lendemain.zip
#
set -euo pipefail

HERE="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
WP_DIR="$(cd "$HERE/.." && pwd)"
THEME_DIR="$WP_DIR/theme/domaine-du-lendemain"
DIST_DIR="$WP_DIR/dist"
ZIP_PATH="$DIST_DIR/domaine-du-lendemain.zip"

if [ ! -d "$THEME_DIR" ]; then
  echo "Thème introuvable : $THEME_DIR" >&2
  exit 1
fi

mkdir -p "$DIST_DIR"
rm -f "$ZIP_PATH"

# Zipper depuis le dossier parent pour conserver le dossier racine
# « domaine-du-lendemain/ » dans l'archive (requis par WordPress).
cd "$WP_DIR/theme"
zip -r -q -X "$ZIP_PATH" "domaine-du-lendemain" \
  -x "*.DS_Store" -x "*__MACOSX*"

echo "✅ Thème packagé : $ZIP_PATH"
echo "   Contenu :"
unzip -l "$ZIP_PATH" | awk 'NR>3 {print "   " $4}' | grep -v '^   $' | head -40
