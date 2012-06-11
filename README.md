Empty Symfony 2 project including FOSUserBundle and FOSFaceBookBundle
=====================================================================

## Introduction
This project is a good start to create a website, because it contains FOSUser and FOSFacebook Bundles.
Those Bundles are working together to manage users on a website.

Users can register and login traditionnaly with FOSUserBundle, and also Registering and login with Facebook.
If a Facebook User doesn't exists in database, it is added.
If a Facebook user's email exists in database (case of an manually previous regitered user), facebook informations are added.

## Prerequisites
Configure a facebook application
> TODO: implement a short tutorial

## Installation
### Download and install the package
* Download zip file from gitHub here: https://github.com/djepo/TemplateViergeSymfony2/zipball/master
* Unzip it where you want
* Install Vendors:
```
php bin/vendors install
```

### update your configuration files:
* app/config/parameters.ini to match your own database (or eventually you can run the symfony's config.php script)
* app/config/config.yml to match with your facebook application
``` yaml
fos_facebook:
        app_id: 123456789101112                        #Your facebook's app id here
        secret: 12a3b546e87d9fb2a16d68f12c6e451b       #Your facebook's secret here
```
* app/config/security.yml to match with your facebook application
``` yaml
fos_facebook:
        app_url: "http://apps.facebook.com/263778820386586/"        #Your facebook's application url
        server_url: "http://localhost/TemplateViergeSymfony2/"      #Your website url as configured in your facebook application
```

### Create and/or update your database
* create your database (if not created yet): ``` php app/console doctrine:database:create```
* Update database: ```php app/console doctrine:schema:update --force```