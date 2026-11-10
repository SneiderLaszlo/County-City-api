Megyék és városok kezelő alkalmazás

Laravel alapú webalkalmazás megyék (counties) és városok (cities) nyilvántartására. Mindkét entitáshoz teljes CRUD funkcionalitás (listázás, létrehozás, szerkesztés, törlés) tartozik.

Funkciók
Megyék listázása, létrehozása, szerkesztése és törlése
Városok listázása, létrehozása, szerkesztése és törlése
RESTful route-ok, névvel ellátva (route('counties.index') stb.)
Követelmények
PHP 8.1 vagy újabb
Composer
Adatbázis (MySQL / MariaDB / SQLite)
Node.js és npm (a frontend assetekhez)
Telepítés
bash
# Repository klónozása
git clone <repository-url>
cd <projekt-mappa>

# Függőségek telepítése
composer install
npm install

# Környezeti fájl létrehozása
cp .env.example .env
php artisan key:generate

Állítsd be az adatbázis-kapcsolatot a .env fájlban:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adatbazis_neve
DB_USERNAME=felhasznalo
DB_PASSWORD=jelszo

Ezután futtasd a migrációkat:

bash
php artisan migrate
Futtatás
bash
php artisan serve
npm run dev

Az alkalmazás alapértelmezés szerint a http://localhost:8000 címen érhető el.

Route-ok
Megyék – CountyController
+---------+-------------------------+------------------+--------------------+--------------------------+
| Metódus | URL                     | Route neve       | Controller metódus | Leírás                   |
+---------+-------------------------+------------------+--------------------+--------------------------+
| GET     | /counties               | counties.index   | index              | Megyék listázása         |
| GET     | /counties/create        | counties.create  | create             | Új megye űrlapja         |
| POST    | /counties               | counties.store   | store              | Új megye mentése         |
| GET     | /counties/{county}/edit | counties.edit    | edit               | Megye szerkesztő űrlapja |
| PATCH   | /counties/{county}      | counties.update  | update             | Megye módosítása         |
| DELETE  | /counties/{county}      | counties.destroy | destroy            | Megye törlése            |
+---------+-------------------------+------------------+--------------------+--------------------------+

Városok – CityController
+---------+---------------------+----------------+--------------------+--------------------------+
| Metódus | URL                 | Route neve     | Controller metódus | Leírás                   |
+---------+---------------------+----------------+--------------------+--------------------------+
| GET     | /cities             | cities.index   | index              | Városok listázása        |
| GET     | /cities/create      | cities.create  | create             | Új város űrlapja         |
| POST    | /cities             | cities.store   | store              | Új város mentése         |
| GET     | /cities/{city}/edit | cities.edit    | edit               | Város szerkesztő űrlapja |
| PATCH   | /cities/{city}      | cities.update  | update             | Város módosítása         |
| DELETE  | /cities/{city}      | cities.destroy | destroy            | Város törlése            |
+---------+---------------------+----------------+--------------------+--------------------------+

A route-ok listája bármikor megtekinthető a következő paranccsal:

bash
php artisan route:list
Projektstruktúra (releváns részek)
app/
├── Http/Controllers/
│   ├── CountyController.php
│   └── CityController.php
└── Models/
    ├── County.php
    └── City.php
routes/
└── web.php
Technológiák
Laravel
PHP
Blade sablonok
Licenc

Ez a projekt MIT licenc alatt érhető el.