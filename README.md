Empty Symfony 2 project including FOSUserBundle and FOSFaceBookBundle
=====================================================================

## Introduction
This project is a good start to create a website, because it contains FOSUser and FOSFacebook Bundles.
Those Bundles are working together to manage users on a website.

Users can register and login traditionnaly with FOSUserBundle, and also Registering and login with Facebook.
If a Facebook User doesn't exists in database, it is added.
If a Facebook user's email exists in database (case of an manually previous regitered user), facebook informations are added.

This projects includes CSS and javascripts from [HTMLKickStart](http://www.99lime.com/) to have a nice render at start.
You are free to drop it if you don't use it.
You'll have to remove css and javascript links in app/Resources/views/base.html.twig if you remove it.

## Prerequisites
Configure a facebook application
> TODO: implement a short tutorial

## Installation
### Download and install the package
* Download zip file from gitHub [here](https://github.com/djepo/TemplateViergeSymfony2/zipball/master)
* Unzip it where you want
* Install Vendors:

```bash
php bin/vendors install
```

### update your configuration files:
* app/config/parameters.ini to match your own database (or eventually you can run the symfony's config.php script)
* app/config/facebookParameters.ini to match with your facebook application

```ini
; Facebook parameters for FOSFacebookBundle
[parameters]
    facebookAppID =     "263778820386586"                           ;Enter your facebook App Id here
    facebookAppSecret=  "2f1efc68065669b14fedd5676d9e1672"          ;Enter your facebook App secret here
    facebookAppUrl=     "http://apps.facebook.com/263778820386586/" ;Enter your facebook App url here
    facebookServerUrl=  "http://localhost/TemplateViergeSymfony2/"  ;Enter your facebook server url here, as configured in your facebook app
```

### Create and/or update your database
* create your database (if not created yet):

```bash
php app/console doctrine:database:create
```

* Update database:

```bash
php app/console doctrine:schema:update --force
```

## Ready !
You can now use this project as a normal symfony 2 project.