# Instrucciones

## Credenciales
Las credenciales van a ir en el archivo config.php
que está en el root del proyecto, en el caso de que se cambie
la base de datos o la dirección del host, se debe cambiar el campo
__connection__ según sea necesario.

# Troubleshoot

## Could not find driver
Esto significa que el módulo PDO no está activo en la configuración de PHP
para solucionarlo solo se deb descomentar las líneas del archivo php.ini
este archivo se encuentra en el directorio de la instalación de PHP en
windows y en linux está en `/etc/php/php.ini`, las líneas a descomentar son:
```
extension=pdo_mysql
extension=mysqli
```