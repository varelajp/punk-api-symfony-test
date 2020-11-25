# punk-api-symfony-test
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSXtZVLUmGNb_FcjwgqrZbPfTBYnehHfmZMtQ&usqp=CAU" width="200">&nbsp;&nbsp;&nbsp;<b>and</b>&nbsp;&nbsp;&nbsp;![alt text](https://symfony.com/images/logos/header-logo.svg "Logo Title Text 1")

Obtiene data de cervezas a trav&eacute;s de la API Punk usando el framework Symfony para PHP.<br>
Get beers data thru the Punk API using PHP Symfony framework.
___
Requisitos / Requirements
------------

  * PHP 7.2.0 o superior / PHP 7.2.0 or higher;
  * y los [requisitos usuales de una aplicaci&oacute;n Symfony][2] / and the [usual Symfony application requirements][2].
  
Instalaci&oacute;n / Install
------------

Clone o descargue este repositorio en su servidor.<br>
No se requiere configuraci&oacute;n alguna para ejecutar la aplicaci&oacute;n. Si tiene
el binario [Symfony instalado][3], ejecute:

Clone or donwload this repo on your server.<br>
There's no need to configure anything to run the application. If you have
[installed Symfony][3] binary, run:

```bash
$ cd my_project/
$ symfony serve
```

Luego ejecute la aplicaci&oacute;n en su navegador en la URL (<https://localhost:8000> por defecto).<br>
Then access the application in your browser at the given URL (<https://localhost:8000> by default).

Si no tiene el binario Symfony instalado, ejecute `php -S localhost:8000 -t public/`
para usar el servidor web PHP integrado o [configure un servidor web][2] como Nginx o
Apache para ejecutar la aplicaci&oacute;n (requiere configuraci&oacute;n en archivos conf o .htaccess).<br>
If you don't have the Symfony binary installed, run `php -S localhost:8000 -t public/`
to use the built-in PHP web server or [configure a web server][2] like Nginx or
Apache to run the application ((requires conf or .htaccess files configuration).

Pruebas / Tests
-----

```bash
$ cd my_project/
$ ./bin/phpunit
```

<img src="https://drive.google.com/uc?export=view&id=12rjrrWdXVoFlWQ2ftypv-wl_5XMRGs8E" width="600" alt="PHPUnit Test">

Endpoint service 1
-----

Usando el servidor PHP integrado / Using built-in PHP web server:<br>
<https://localhost:8000/search-by-food/{word-to-search}><br>
En un servidor web Nginx o Apache / On a Nginx or Apache web server:<br>
<http://server/api_path/search-by-food/{word-to-search}>

Endpoint service 2
-----

Usando el servidor PHP integrado / Using built-in PHP web server:<br>
<https://localhost:8000/search-by-id/{id-to-search}><br>
En un servidor web Nginx o Apache / On a Nginx or Apache web server:<br>
<http://server/api_path/search-by-id/{id-to-search}>

Live Demo
-----

http://varelajp.byethost15.com/test/php/punk-api-test/public/search-by-id/4<br>
http://varelajp.byethost15.com/test/php/punk-api-test/public/search-by-id/6<br>
http://varelajp.byethost15.com/test/php/punk-api-test/public/search-by-food/meat<br>
http://varelajp.byethost15.com/test/php/punk-api-test/public/search-by-food/chicken<br>
http://varelajp.byethost15.com/test/php/punk-api-test/public/search-by-food/Spicy_chicken_tikka_masala

[1]: https://symfony.com/doc/current/reference/requirements.html
[2]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html
[3]: https://symfony.com/download

