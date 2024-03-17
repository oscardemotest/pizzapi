init-project:
    composer install
    symfony console doctrine:database:create
    symfony console doctrine:migrations:migrate --no-interaction
    symfony console doctrine:fixtures:load --no-interaction

update-database-schema:
    symfony console doctrine:migrations:diff
    symfony console doctrine:migrations:migrate --no-interaction

load-fixtures-data:
    symfony console doctrine:fixtures:load --no-interaction
