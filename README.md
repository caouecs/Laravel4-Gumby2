Laravel4-Gumby2
===

This package includes [Gumby2 Framework](http://www.gumbyframework.com) functions for a [Laravel](http://www.laravel.com) project.


Installation
---

This package is available through packagist and composer.

Add `"caouecs/gumby2": "dev-master"` to your composer.json or run `composer require caouecs/gumby2`. Then you have to add `"Caouecs\Gumby2\Gumby2ServiceProvider"` to your list of providers in your `app/config/app.php`.

But I recommend you use [Package Installer](https://github.com/rtablada/package-installer), Laravel4-Gumby2 has a valid provides.json file. After installation of Package Installer, just run `php artisan package:install caouecs/gumby2` ; the lists of providers and aliases will be up-to-date.



For the moment
---

Just for test, and you need some scss files from https://github.com/caouecs/Gumby/tree/features_more/sass/more for alert with close and for breadcrumbs.


Elements
---

* Alert
  * Alert::large_pretty("My text")->close()
* Badge
  * Badge::small_danger("My text")
* Breadcrumb
  * Breadcrumb::show()->add("Home", "/")->add("News", "/news")->add("My News")
* Button
  * Button::xlarge_pillleft_warning("My text")
* Icon
  * Icon::github()->link("/welcome")
* Image
  * Image::rounded_six("/img/my_photo.png")
* Label
  * Label::success("My text")
* Tabs
  * Tabs::normal(array("class" => "splendid"))->add("Title 1", "Texte 1")->add("Title 2", "Texte 2", true)
* Valign
