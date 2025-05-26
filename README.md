# 🍽️ Laravel 11 Moniravintola-Ruokatilausjärjestelmä

**Moderni moniravintolainen tilausjärjestelmä Laravel 11:llä**

Täysin toimiva verkkopohjainen ruokatilausjärjestelmä, joka tukee useita ravintoloita, roolipohjaista käyttöoikeudenhallintaa ja integroituja maksupalveluja.

![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

## 📑 Sisällysluettelo
- [Ominaisuudet](#ominaisuudet)
- [Teknologiat](#teknologiat)
- [Asennus](#asennus)

## ✨Ominaisuudet

### 🏪Ravintolanhallinta
- **Moniravintola-arkkitehtuuri** eristetyillä tietokannoilla
- **Ylläpitopaneeli** ruokalistojen ja tilauksien hallintaan
- **Dynaaminen hinnastojen hallinta** Excel-tuella
- **Reaaliaikainen tilausseuranta** karttaintegraatiolla

### 👥Roolipohjainen järjestelmä
- **Asiakkaat**: Selaa ravintoloita, tee tilauksia, jätä arviointeja
- **Ravintoloitsijat**: Hallitse menua ja analysoi myyntiä
- **Pääylläpitäjä**: Järjestelmän laajamittainen konfigurointi

### 💳Maksujärjestelmät
- Integroidut **Stripe** -maksupalvelut
- **Kuponkien ja alennusten hallinta**
- Automaattiset **PDF-laskut** sähköpostitse

## 🛠️Teknologiat

### Backend
- Laravel 11 PHP-kehys
- MySQL 8.0+ relaatiotietokanta
- Laravel Breeze moniautentikointiin
- Spatie Permission -käyttöoikeudet

### Frontend
- Blade-mallit
- Bootstrap 5 CSS-kehys
- JavaScript ES6+
- jQuery DOM-manipulaatioon

## 🚀Asennus

### Järjestelmävaatimukset
- PHP 8.3+
- MySQL 8.0+ tai MariaDB 10.4+
- Composer 2.6+
- Node.js 18+

### Asennusvaiheet

1. Kloonaa repositorio
`git clone https://github.com/Rellance/ReW
cd ReW`
2. Asenna PHP-riippuvuudet
`composer install --no-dev --optimize-autoloader`


3. Asenna Node.js -riippuvuudet
`npm install && npm run build`


4. Määritä ympäristömuuttujat
`cp .env.example .env
php artisan key:generate`

5. Suorita tietokantamigraatiot
`php artisan migrate --seed`

6. Käynnistä palvelin
`php artisan serve`

