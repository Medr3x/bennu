# Bennu
    - Se penso en usar un login, un registro y un cierre de sesion debido a que un usuario puede suscribirse a n tipos de servicios.
    Esto permite separar y encapsular mejor el codigo permitiendo escalar el desarrollo de esta API.
    - Para entender como consumir el api entrar en:
    localhost/api/documentation una vez ejecutado el comando de swagger.
    
# Requiremientos del Servidor

    - Laravel 9.* & MySQL
    - PHP >= 8.*

# Instalación

    git clone https://github.com/Medr3x/bennu.git bennu
    composer install
    cp example.env .env

# Editar .env
    *Crear BD*
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_name
    DB_USERNAME=db_username
    DB_PASSWORD=db_password
     
# Luego ejecutar
    php artisan migrate:fresh --seed
    php artisan l5-swagger:generate

# Command artisan:
    php artisan command:daily-report-subcriptions {YYYY-MM-DD}

# Command artisan ej:
    php artisan command:daily-report-subcriptions 2023-03-09
