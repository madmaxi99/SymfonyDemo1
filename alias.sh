export UID=$UID
alias dc="docker compose -f provisioning/development/docker-compose.yml -p symfony"
alias rcli="dc exec php-fpm php bin/cli.php"
alias rnpm="dc exec node npm"
alias rcomposer="dc exec php-fpm composer"
alias rchmod="dc exec php-fpm chmod 777 /tmp -R"
