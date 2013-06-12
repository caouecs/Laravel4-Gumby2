Laravel4-Gumby2
===

This package includes [Gumby2 Framework](http://www.gumbyframework.com) functions for a [Laravel](http://www.laravel.com) project.


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
