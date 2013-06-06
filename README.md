Laravel4-Gumby2
===

This package includes [Gumby2 Framework](http://www.gumbyframework.com) functions for a [Laravel](http://www.laravel.com) project.


For the moment
---

Don't use, it's under construction.


Elements
---

* Alert
  * Alert::large_pretty("My text")
* Badge
  * Badge::small_danger("My text")
* Breadcrumb (not include in Gumby2, you need _breadcrumb.scss)
  * Breadcrumb::show()->add("Home", "/")->add("News", "/news")->add("My News")
* Button
  * Button::xlarge_pillleft_warning("My text")
* Form (not finish)
* Icon
  * Icon::github()
* Image
  * Image::rounded_six("/img/my_photo.png")
* Label
  * Label::success("My text")
* Tabs
  * Tabs::show(array("class" => "splendid"))->add("Title 1", "Texte 1")->add("Title 2", "Texte 2", true)