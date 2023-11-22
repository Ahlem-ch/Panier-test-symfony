
Author : Ahlem CHIKHA 


## Stack 

- Symfony 5.4
- Twig
- Bootstrap
-MySQL

## How to install project 

- After cloning the repo, run :
  
    ```bash
    composer install
    ```

- Import the database from file e-commerce-symfo.sql

- Specify the work environment :

    ```bash
    DATABASE_URL="mysql://user_name:password@127.0.0.1:3306/database_name?serverVersion=mariadb-10.3.25"
    APP_ENV=dev
    ```

- If needed, clear cache :

    ```bash
    php bin/console cache:clear
    ```
