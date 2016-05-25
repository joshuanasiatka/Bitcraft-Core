#/bin/sh
cd core/lib/
echo "Updating Bower"
npm i -g bower
echo "Installing Bower dependencies"
bower install
echo "Done!"
