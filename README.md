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
A Facebook Application properly configured.

> ### How to Create A facebook application (Quick mode !)
> 1. Navigate to: https://developers.facebook.com/apps.
> 2. Click on "Create an application" on the top right side.
> 3. Enter a name for your application.
> 4. Navigate to Application parameters, go in "essentials" (the first entry).
> 5. Click on "Website with Facebook Login".
> 6. Enter your Website's URL.
> 7. Save Modifications.

## Installation
### Download and install the package
* Download zip file from gitHub [here](https://github.com/djepo/TemplateViergeSymfony2/zipball/master)
* Unzip it where you want
* Install Vendors:

```bash
php composer.phar install
```

### update your configuration files:
* app/config/parameters.ini to match your own database (or eventually you can run the symfony's config.php script)
* app/config/facebookParameters.ini to match with your facebook application

```ini
; Facebook parameters for FOSFacebookBundle
[parameters]
    ;Enter your facebook App Id here
    facebookAppID =     "263778820386586"

    ;Enter your facebook App secret here
    facebookAppSecret=  "2f1efc68065669b14fedd5676d9e1672"

    ;Enter your facebook App url here
    facebookAppUrl=     "http://apps.facebook.com/263778820386586/"

    ;Enter your facebook server url here, as configured in your facebook app    
    facebookServerUrl=  "http://localhost/TemplateViergeSymfony2/"

    ;Enter locale here (for language on the login button). Enter for exemple en_US for english, fr_FR for french etc...
    ;See https://www.facebook.com/translations/FacebookLocales.xml for the whole list of locales
    facebookLocale=    "en_US"
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

## Modify your website's parameters
Modify app/config/websiteParameters.ini and update parameters to match with your website

```ini
; Website parameters
[parameters]

    websiteName =       "Your Title Here"

    websiteSlogan =     "Your Slogan Here"

    websiteBirthYear=   "2012"

    websiteUseFacebookLogin=    true

```

## Ready !
You can now use this project as a normal symfony 2 project.