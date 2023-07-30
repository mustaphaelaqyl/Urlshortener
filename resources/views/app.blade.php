<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ mix('/css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
    @routes
    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>