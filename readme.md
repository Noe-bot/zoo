# Mon Zoo

## Installation de composer

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

## Commandes utiles

```bash
# Mettre à jour les dépendances
php composer.phar update
# Lancer mon script
php public/index.php
# Lancer les tests
./vendor/bin/phpunit
```

## Commandes utiles (docker)

```bash
# Mettre à jour les dépendances
docker run --rm -it -v $PWD:/app composer update
# Lancer mon script
docker run --rm -it -v $PWD:/app -w /app php:7.4-cli php public/index.php
# Lancer les tests
docker run --rm -it -v $PWD:/app -w /app php:7.4-cli vendor/bin/phpunit
```
