composer require annotations
composer require twig
composer require profiler
composer require maker-bundle
composer require form
composer require validator
composer require orm
composer require asset

pour compiler le css & le js :
node_modules/.bin/encore dev //permet de compiler le css & js
node_modules/.bin/encore dev --watch //permet de compiler automatiquement le css & js
node_modules/.bin/encore production //permet de versionner le css & js
node_modules/.bin/encore dev-server //lance un server pour le css & js avec reload automatique