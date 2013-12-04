<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/WebPage"> <!--<![endif]-->
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="Caouecs">
    <title>
        Demo Laravel4-Gumby2 project
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/gumby/2.5.11/css/gumby.css">

    <script src="//cdn.jsdelivr.net/gumby/2.5.11/js/libs/modernizr-2.6.2.min.js"></script>

    <style>
      .container {
        margin: 0 auto;
        max-width: 1070px;
      }
    </style>

  </head>
  <body>

    <div class="container">

      <h1>Demo of Laravel4-Gumby2 project</h1>

      <h3>Buttons</h3>

      <div class="row">
          <div class="six columns">
              <h4>Metro Style</h4>

              {{ Button::primary('Primary')->link("#") }}

              {{ Button::secondary('Secondary')->link("#") }}

              {{ Button::medium('Default')->link("#") }}

              {{ Button::info('Info')->link("#") }}

              {{ Button::danger('Danger')->link("#") }}

              {{ Button::warning('Warning')->link("#") }}

              {{ Button::success('Success')->link("#") }}

              {{ Button::info('Icon Left')->link("#")->appendIcon("mail") }}

              {{ Button::medium('Icon Right')->link("#")->prependIcon("camera") }}

              {{ Button::medium('<input type="submit" value="Submit" />') }}

              {{ Button::info('<button>Button</button>') }}
          </div>
          <div class="six columns">

              <h4>Pretty Style</h4>

              {{ Button::pretty_primary('Primary')->link("#") }}

              {{ Button::pretty_secondary('Secondary')->link("#") }}

              {{ Button::pretty_default('Default')->link("#") }}

              {{ Button::pretty_info('Info')->link("#") }}

              {{ Button::pretty_danger('Danger')->link("#") }}

              {{ Button::pretty_warning('Warning')->link("#") }}

              {{ Button::pretty_success('Success')->link("#") }}

              {{ Button::pretty_info('Icon Left')->link("#")->appendIcon("mail") }}

              {{ Button::pretty_default('Icon Right')->link("#")->prependIcon("camera") }}

              {{ Button::pretty_default('<input type="submit" value="Submit" />') }}

              {{ Button::pretty_info('<button>Button</button>') }}
          </div>
      </div>

      <div class="row">
          <div class="six columns">
              <h4>Sizes</h4>

              {{ Button::xlarge("Extra large")->link("#") }}

              {{ Button::large("large")->link("#") }}

              {{ Button::medium("Medium")->link("#") }}

              {{ Button::small("Small")->link("#") }}

          </div>
          <div class="six columns">
              <h4>Styles</h4>

              {{ Button::oval("Oval")->link("#") }}

              {{ Button::rounded("Rounded")->link("#") }}

              {{ Button::squared("Squared")->link("#") }}

              {{ Button::pillleft("Pill Left")->link("#") }}

              {{ Button::pillright("Pill Right")->link("#") }}

          </div>
      </div>

      <h3>Indicators</h3>

      <div class="row">
          <div class="six columns">
              <h4>Badges</h4>

              {{ Badge::primary("2") }}

              {{ Badge::secondary("2") }}

              {{ Badge::create("2") }}

              {{ Badge::info("2") }}

              {{ Badge::danger("2") }}

              {{ Badge::warning("2") }}

              {{ Badge::success("2") }}

              {{ Badge::light("2") }}

              {{ Badge::dark("2") }}

          </div>
          <div class="six columns">
              <h4>Labels</h4>

              {{ Label::primary("Primary") }}

              {{ Label::secondary("Secondary") }}

              {{ Label::create("Default") }}

              {{ Label::info("Info") }}

              {{ Label::danger("Danger") }}

              {{ Label::warning("Warning") }}

              {{ Label::success("Success") }}

              {{ Label::light("Light") }}

              {{ Label::dark("Dark") }}

          </div>
      </div>

      <h4>Alerts</h4>

      {{ Alert::primary("KHAAAAAAAAAAAAAAANNNN!!!!") }}

      {{ Alert::secondary("We are the Silence. And Silence will fall!") }}

      {{ Alert::create("Fezzes are cool.") }}

      {{ Alert::info("Don't blink. Blink and you're dead.") }}

      {{ Alert::danger("I’m sorry, Dave. I’m afraid I can’t do that.") }}

      {{ Alert::warning("My spidey sense is tingling...") }}

      {{ Alert::success("Great Success! Very nice!") }}

      <h4>Alerts with close</h4>

      {{ Alert::primary("KHAAAAAAAAAAAAAAANNNN!!!!")->close() }}

      {{ Alert::secondary("We are the Silence. And Silence will fall!")->close() }}

      {{ Alert::create("Fezzes are cool.")->close() }}

      {{ Alert::info("Don't blink. Blink and you're dead.")->close() }}

      {{ Alert::danger("I’m sorry, Dave. I’m afraid I can’t do that.")->close() }}

      {{ Alert::warning("My spidey sense is tingling...")->close() }}

      {{ Alert::success("Great Success! Very nice!")->close() }}


      <h3>Breadcrumbs</h3>

          {{
              Breadcrumb::create()
                  ->add("Home", "/admin/news")
                  ->add("Library", "#")
                  ->add("Data")
          }}

      <h3>Tabs</h3>

          {{
              Tabs::normal()
                  ->add("Populaires", "Proin elit arcu, rutrum commodo...", true)
                  ->add("Archives", "Morbi tincidunt, dui sit amet facilisis feugiat...")
                  ->add("Récents", "Mauris eleifend est et turpis. Duis id erat...")
          }}


      <h4>Vertical Tabs</h4>

          {{
              Tabs::vertical()
                  ->add("Populaires", "Proin elit arcu, rutrum commodo...", true)
                  ->add("Archives", "Morbi tincidunt, dui sit amet facilisis feugiat...")
                  ->add("Récents", "Mauris eleifend est et turpis. Duis id erat...")
          }}

      <h4>Pill Tabs</h4>

          {{
              Tabs::pill()
                  ->add("Populaires", "Proin elit arcu, rutrum commodo...", true)
                  ->add("Archives", "Morbi tincidunt, dui sit amet facilisis feugiat...")
                  ->add("Récents", "Mauris eleifend est et turpis. Duis id erat...")
          }}

      <h4>Bottom Tabs</h4>

      <p>Need CSS from <i>more.css</i></p>

          {{
              Tabs::bottom()
                  ->add("Populaires", "Proin elit arcu, rutrum commodo...", true)
                  ->add("Archives", "Morbi tincidunt, dui sit amet facilisis feugiat...")
                  ->add("Récents", "Mauris eleifend est et turpis. Duis id erat...")
          }}

      <h3>Icons</h3>

      {{ Icon::note() }}

      {{ Icon::heart() }}

      {{ Icon::flag() }}

      {{ Icon::github() }}

      <h3>Images</h3>

      <div class="row">

        {{ Image::rounded_six("http://gumbyframework.com/img/img_silence_demo.jpg", "StarWars") }}

        {{ Image::circle_three("http://gumbyframework.com/img/img_silence_demo.jpg", "StarWars") }}

        {{ Image::polaroid_five("http://gumbyframework.com/img/img_silence_demo.jpg")->retina() }}

      </div>
    </div>


    <!-- Grab Google CDN's jQuery, fall back to local if offline -->
    <!-- 2.0 for modern browsers, 1.10 for .oldie -->
    <script>
      var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
      if (!oldieCheck) {
        document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"><\/script>');
      } else {
        document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"><\/script>');
      }
    </script>
    <script src="//cdn.jsdelivr.net/gumby/2.5.11/js/libs/gumby.min.js"></script>
    <script src="//cdn.jsdelivr.net/gumby/2.5.11/js/plugins.js"></script>
    <script src="//cdn.jsdelivr.net/gumby/2.5.11/js/main.js"></script>

  </body>
</html>