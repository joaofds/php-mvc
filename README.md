## Pré Requisitos

- PHP >= 7.2
- Apache >= 2

## Instalação

Navegar até a raiz do projeto.

```
composer install
```

O Vhost do apache deve apontar para o diretório `/public`.

## Configurações

O banco de dados pode ser configurado na classe `Database/Connect.php`.

```php
    private const HOST = 'localhost';
    private const USER = 'usuario';
    private const PASSWD = 'senha';
    private const DBNAME = 'nome_do_seu_banco';
```

Para aprender a configurar um Vhost no apache no linux [Vhost Linux](https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-18-04-pt).

Windows você pode usar... [Xampp](https://www.apachefriends.org/pt_br/index.html), [Wamp Server](https://www.wampserver.com/en/) ou o [Laragon](https://laragon.org/download/index.html).
