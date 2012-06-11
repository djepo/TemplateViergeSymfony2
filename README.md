Empty Symfony 2 project including FOSUserBundle and FOSFaceBookBundle
=====================================================================

This project is a good start to create a website, because it contains FOSUser and FOSFacebook Bundles.
Those Bundles are working together to manage users on a website.

Users can register and login traditionnaly with FOSUserBundle, and also Registering and login with Facebook.
If a Facebook User doesn't exists in database, it is added.
If a Facebook user's email exists in database (case of an manually previous regitered user), facebook informations are added.

What you have to do:
* Download zip file from gitHub here: https://github.com/djepo/TemplateViergeSymfony2/zipball/master
* Unzip it where you want
* Install Vendors:
``` bash
 php bin/vendors install
```
* update configuration files:

* create your database (if not created yet): php app/console doctrine:database:create
* Update database: php app/console doctrine:schema:update --force