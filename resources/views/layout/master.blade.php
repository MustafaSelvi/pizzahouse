<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/site.css">
      
        <link rel="stylesheet" type="text/css" href="css/container.css">
        <link rel="stylesheet" type="text/css" href="css/grid.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <link rel="stylesheet" type="text/css" href="css/image.css">
        <link rel="stylesheet" type="text/css" href="css/menu.css">
      
        <link rel="stylesheet" type="text/css" href="css/divider.css">
        <link rel="stylesheet" type="text/css" href="css/list.css">
        <link rel="stylesheet" type="text/css" href="css/segment.css">
        <link rel="stylesheet" type="text/css" href="css/dropdown.css">
        <link rel="stylesheet" type="text/css" href="css/icon.css">


    </head>
    <body>
 @yield('content')

    <footer>
        <div class="ui inverted vertical footer segment">
            <div class="ui center aligned container">
              <div class="ui stackable inverted divided grid">
                <div class="three wide column">
                  <h4 class="ui inverted header">Group 1</h4>
                  <div class="ui inverted link list">
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link One</a>
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link Two</a>
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link Three</a>
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link Four</a>
                  </div>
                </div>
                <div class="three wide column">
                  <h4 class="ui inverted header">Group 2</h4>
                  <div class="ui inverted link list">
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link One</a>
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link Two</a>
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link Three</a>
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link Four</a>
                  </div>
                </div>
                <div class="three wide column">
                  <h4 class="ui inverted header">Group 3</h4>
                  <div class="ui inverted link list">
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link One</a>
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link Two</a>
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link Three</a>
                    <a href="https://semantic-ui.com/examples/fixed.html#" class="item">Link Four</a>
                  </div>
                </div>
                <div class="seven wide column">
                  <h4 class="ui inverted header">Footer Header</h4>
                  <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
                </div>
              </div>
              <div class="ui inverted section divider"></div>
              <img src="./src/shipping-logo-long-white.png" class="ui centered large image">
              <div class="ui horizontal inverted small divided link list">
                <a class="item" href="https://semantic-ui.com/examples/fixed.html#">Site Map</a>
                <a class="item" href="https://semantic-ui.com/examples/fixed.html#">Bug Report</a>
                <a class="item" href="https://semantic-ui.com/examples/fixed.html#">Terms and Conditions</a>
                <a class="item" href="https://semantic-ui.com/examples/fixed.html#">Privacy Policy</a>
              </div>
              <p><a href="https://heraklet.com">HERAKLET Web App Dev Team Proudly Present</a></p>
            </div>
          </div>
        
    </footer>   
    </body>
    </html>
    