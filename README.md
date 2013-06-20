# Laravel4-Gumby2

This package includes UI modules of [Gumby Framework](http://www.gumbyframework.com) for a [Laravel](http://www.laravel.com) project.


## Installation

This package is available through Packagist and Composer.

Add `"caouecs/gumby2": "dev-master"` to your composer.json or run `composer require caouecs/gumby2`. Then you have to add `"Caouecs\Gumby2\Gumby2ServiceProvider"` to your list of providers in your `app/config/app.php`, and a big list of elements for aliases :

    'Alert'			  => 'Caouecs\Gumby2\Alert',
    'Badge'			  => 'Caouecs\Gumby2\Badge',
    'Breadcrumb'	  => 'Caouecs\Gumby2\Breadcrumb',
	'Button'		  => 'Caouecs\Gumby2\Button',
	'Icon'			  => 'Caouecs\Gumby2\Icon',
	'Image'			  => 'Caouecs\Gumby2\Image',
	'Label'			  => 'Caouecs\Gumby2\Label',
	'Tabs'			  => 'Caouecs\Gumby2\Tabs',
	'Typography'	  => 'Caouecs\Gumby2\Typography',
	'Valign'		  => 'Caouecs\Gumby2\Valign'

So, I recommend you use [Package Installer](https://github.com/rtablada/package-installer), Laravel4-Gumby2 has a valid provides.json file. After installation of Package Installer, just run `php artisan package:install caouecs/gumby2` ; the lists of providers and aliases will be up-to-date.

## Requirements

You must have last version of Gumby Framework, and the last version of GumbyUI-extras for breadcrumbs, tabs bottom, alerts with close…

Gumby Framework is available on the [official website](http://www.gumbyframework.com), on [GitHub](https://github.com/GumbyFramework/Gumby) and on Bower.

    $ bower install gumby

GumbyUI-extras is available on [GitHub](https://github.com/caouecs/gumbyui-extras) and on Bower.

    $ bower install gumbyui-extras

## Recommandation

This project is not yet stable version, and name of methods can change.

---

## Buttons

You can display buttons with Button class, you can choose design, color and size from Gumby Framework or from your personal css.

Displays a button with metro style, rounded, a large size, and with the color orange.

    Button::large_rounded_warning("My text")
    <div class="large rounded warning btn">My text</div>
    
Displays a button with pretty style, an icon of GitHub and more possibilities.

    Button::pretty_primary("My other text", array("id" => "my_button"))->append("github")->tag("p")
    <p class="medium pretty primary entypo icon-github icon-left btn" id="my_button">My other text</p>

## Indicators

You can choose between three different indicators : Alert, Badge and Label. It's the same principle than buttons.

Displays a secondary badge.

    Badge::secondary("My new text")
    <span class="secondary badge">My new text</span>

Displays a alert box with close button

    Alert::success("Youpi !")->close()
    <div class="alert success alert_1">
        <a href="#" gumby-trigger=".alert_1" class="switch close">&times;</a>
        Youpi !
    </div>

## Breadcrumbs

You can display a simple breadcrumb.

    Breadcrumb::show()->add("Home", "/")->add("News", "/news")->add("My News")
    <ul class="breadcrumb"><li><a href="/">Home</a></li><li><a href="/news">News</a></li><li>My News</li></ul>

## Icons

Gumby offers a big list of icons, you can display them with Icon class.

Displays the icon of GitHub

    Icon::github()
    <i class="icon entypo icon-github"></i>

Displays the icon of Twitter with a link

    Icon::twitter()->link("https://twitter.com/caouecs")
    <a href="https://twitter.com/caouecs"><i class="icon entypo icon-twitter"></i></a>

## Responsive Images

You can have pretty images with Image class.

Displays a rounded image on six columns

    Image::rounded_six("/img/my_image.png", "Nice")
    <div class="six columns rounded image"><img src="/img/my_image.png" alt="Nice" /></div>

Displays an image with Retina option

    Image::polaroid_five("/img/my_second_image.png")->retina()
    <div class="five columns photo polaroid image"><img src="/img/my_second_image.png" alt="" gumby-retina /></div>

## Tabs

Add tabs in your project with Tabs class.

Displays simple tabs

    Tabs::normal()->add("Title 1", "Texte 1")->add("Title 2", "Texte 2", true)
    <div class="tabs">
        <ul class="tab-nav">
            <li><a href="#">Title 1</a></li>
            <li class="active"><a href="#">Title 2</a></li>
        </ul>
        <div class="tab-content">
            Texte 1
        </div>
        <div class="tab-content active">
            Texte 2
        </div>
    </div>

Displays a vertical tabs, with the size of tab-nav (six columns)

    Tabs::vertical_six()

Displays a bottom tabs

    Tabs::bottom()

Displays a pill tabs

    Tabs::pill()

## Typography

Add colors to your texts.

    Typography::primary("my text")
    <p class="text-primary">my text</p>

## Vertical Alignment

Vertically align images and text, with Valign class.

Displays a vertical alignment

    Valign::show()->image("/img/my_image.png")->text("My text")

---

MIT Open Source License

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.