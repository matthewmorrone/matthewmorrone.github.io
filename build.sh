set -e

rm -rf projects/diachron-db projects/flash projects/ipa projects/morse projects/sheet projects/chess projects/space

git clone --depth 1 https://github.com/matthewmorrone/diachron-db projects/diachron-db
git clone --depth 1 https://github.com/matthewmorrone/flash projects/flash
git clone --depth 1 https://github.com/matthewmorrone/ipa projects/ipa
git clone --depth 1 https://github.com/matthewmorrone/morse projects/morse
git clone --depth 1 https://github.com/matthewmorrone/sheet projects/sheet
git clone --depth 1 https://github.com/matthewmorrone/chess projects/chess
git clone --depth 1 https://github.com/matthewmorrone/spaaace projects/space
