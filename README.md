# skitricks

# git clone https://github.com/PepinoFr/skitricks.git
# si pas composer
# curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
# php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
# Il faut créer une base de données donc 
# php bin/console doctrine:database:create
# modifier la variable "DATABASE_URL" dans le fichier .env pour modifier "skitricks" par le nom donné

#Pour configurer l'envoie d'email pour il faut modifier les variables "EMAIL" et "motdepasse" dans le .env

#Pour créer les tables
# php bin/console make:migration
# php bin/console doctrine:migrations:migrate

#Pour ajouter le contenu 
# php bien/console doctrine:fixtures:load

# Puis lancer le serveur
#  php bin/console server:run
 
