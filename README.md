# Site multi-App
<hr>

## Liens utiles 
* https://symfony.com/doc/current/doctrine/multiple_entity_managers.html
* https://github.com/AvaiBookSports/DoctrineMigrationsMultipleDatabaseBundle


## .env file
```sh
# In all environments, the following files are loaded if they exist,
# the latter taking precedence over the former:
#
#  * .env                contains default values for the environment variables needed by the app
#  * .env.local          uncommitted file with local overrides
#  * .env.$APP_ENV       committed environment-specific defaults
#  * .env.$APP_ENV.local uncommitted environment-specific overrides
#
# Real environment variables win over .env files.
#
# DO NOT DEFINE PRODUCTION SECRETS IN THIS FILE NOR IN ANY OTHER COMMITTED FILES.
#
# Run "composer dump-env prod" to compile .env files for production use (requires symfony/flex >=1.2).
# https://symfony.com/doc/current/best_practices.html#use-environment-variables-for-infrastructure-configuration

###> symfony/framework-bundle ###
APP_ENV=dev
APP_SECRET=6f6f0f016a3f0a87a3854799fccb7424
#TRUSTED_PROXIES=127.0.0.0/8,10.0.0.0/8,172.16.0.0/12,192.168.0.0/16
#TRUSTED_HOSTS='^(localhost|example\.com)$'
###< symfony/framework-bundle ###

###> symfony/mailer ###
# MAILER_DSN=smtp://localhost
###< symfony/mailer ###

###> doctrine/doctrine-bundle ###
# Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
# IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
#
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
# DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"
DATABASE_URL="postgresql://user:mdp@adresse:5432/app_locale_base?serverVersion=13&charset=utf8"
DATABASE_ASL_URL="postgresql://user:mdp@adresse:5432/Asl?serverVersion=13&charset=utf8"
DATABASE_EXPLOC_URL="postgresql://user:mdp@adresse:5432/Exploc?serverVersion=13&charset=utf8"
DATABASE_DETR_URL="postgresql://user:mdp@adresse:5432/Detr?serverVersion=13&charset=utf8"
###< doctrine/doctrine-bundle ###
```
## config/packages/doctrine.yaml

```yaml
doctrine:
    dbal:
        default_connection: default
        connections: 
            default:
                url: '%env(resolve:DATABASE_URL)%'
                driver: 'pdo_pgsql'
                server_version: '13'
                charset: utf8mb4
            asl:
                # configure these for your database server
                url: '%env(resolve:DATABASE_ASL_URL)%'
                driver: 'pdo_pgsql'
                server_version: '13'
                charset: utf8mb4
            exploc:
                # configure these for your database server
                url: '%env(resolve:DATABASE_EXPLOC_URL)%'
                driver: 'pdo_pgsql'
                server_version: '13'
                charset: utf8mb4
            detr:
                # configure these for your database server
                url: '%env(resolve:DATABASE_DETR_URL)%'
                driver: 'pdo_pgsql'
                server_version: '13'
                charset: utf8mb4
        # IMPORTANT: You MUST configure your server version,
        # either here or in the DATABASE_URL env var (see .env file)
        #server_version: '13'
    orm:
        default_entity_manager: default
        entity_managers:
            default:
                connection: default
                mappings:
                    Main:
                        is_bundle: false
                        type: annotation
                        dir: '%kernel.project_dir%/src/Entity/Main'
                        prefix: 'App\Entity\Main'
                        alias: Main
            asl:
                connection: asl
                mappings:
                    Asl:
                        is_bundle: false
                        type: annotation
                        dir: '%kernel.project_dir%/src/Entity/Asl'
                        prefix: 'App\Entity\Asl'
                        alias: Asl
            exploc:
                connection: exploc
                mappings:
                    Exploc:
                        is_bundle: false
                        type: annotation
                        dir: '%kernel.project_dir%/src/Entity/Exploc'
                        prefix: 'App\Entity\Exploc'
                        alias: Exploc
            detr:
                connection: detr
                mappings:
                    Detr:
                        is_bundle: false
                        type: annotation
                        dir: '%kernel.project_dir%/src/Entity/Detr'
                        prefix: 'App\Entity\Detr'
                        alias: Detr
```
## config/package/doctrine_migrations_multiple_database.yaml

```yaml
doctrine_migrations_multiple_database:
    entity_managers:
        default:
            migrations_paths:
                DoctrineMigrations\Main: '%kernel.project_dir%/migrations/Main'
        asl:
            migrations_paths:
                DoctrineMigrations\Asl: '%kernel.project_dir%/migrations/Asl'
        exploc:
            migrations_paths:
                DoctrineMigrations\Exploc: '%kernel.project_dir%/migrations/Exploc'
```

## Migration

```sh
php bin/console doctrine:migrations:diff --em=asl
```
```sh
php bin/console doctrine:migrations:migrate --em=asl
```