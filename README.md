This is a test web app allowing to view, add and edit buildings stored in
a database.

INSTALLATION
------------

Create a database for the application.

Clone this repo.

Install dependencies:

    cd teleport-buildings
    composer install

Edit the file `config/db.php` with real data.

Fill a database:

    php yii migrate/up

Build the frontend:

    cd frontend
    yarn install && yarn build

Start a web server:

    cd ..
    php yii serve --port=8888

You can then access the application through the following URL:

    http://localhost:8888
