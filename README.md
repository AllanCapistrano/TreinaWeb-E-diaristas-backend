# E-diaristas | TreinaWeb Multi - Stack

## 📚 Descrição ##
Repositório que contém o projeto desenvolvido durante o Workshop Multi-stack organizado pela [**TreinaWeb**](https://www.treinaweb.com.br/). <br />
O projeto trata-se de uma platafora para a contratação de diarista.

- [Frontend](https://github.com/AllanCapistrano/TreinaWeb-E-diaristas)
- [Mobile](https://github.com/AllanCapistrano/TreinaWeb-E-diaristas-mobile)

**🔗 Tecnologias utilizadas:**
- [Laravel](https://laravel.com/)

**📊 Dependências:**
- [Bootstrap](https://getbootstrap.com/)
- [jQuery](http://code.jquery.com/)
- [guzzle](https://laravel.com/docs/8.x/http-client)
- [laravel-pt-br-localization](https://github.com/lucascudo/laravel-pt-BR-localization)
- [php-mask](https://github.com/clemdesign/php-mask)

------------

## 🖥️ Como ver o projeto e modificá-lo ##

1. Faça um Fork deste repositório (caso queira modificá-lo) ou somente clone este repositório;
2. Instale o [PHP](https://www.php.net/downloads) ou o [XAMPP](https://www.apachefriends.org/pt_br/index.html) (caso necessário);
3. Instale o [Composer](https://getcomposer.org/download/) (caso necessário);
4. Após instalar o PHP ou o XAMPP e o Composer, abra um terminal no diretório do projeto, e digite:
```powershell
composer install
```
5. Após as dependências estarem instaladas, digite os seguintes comandos:
```powershell
cp .env-example .env
php artisan key:generate
```
6. No arqui `.env` será necessário configurar as credenciais do seu banco de dados, após isso digite no terminal:
```powershell
php artisan migrate
```
7. Para iniciar o projeto, ainda com o terminal aberto no diretório do projeto, digite:
```powershell
php artisan serve
```

------------

## 📌 Autor ##
- Allan Capistrano: [Github](https://github.com/AllanCapistrano) - [Linkedin](https://www.linkedin.com/in/allancapistrano/) - [E-mail](https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&source=mailto&to=asantos@ecomp.uefs.br)

------------

## ⚖️ Licença ##
[MIT License](https://github.com/AllanCapistrano/TreinaWeb-E-diaristas-backend/blob/main/LICENSE)
