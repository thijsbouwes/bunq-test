let mix = require('laravel-mix')

mix.js('resources/js/tool.js', 'dist/js/app.js').scripts(
    [
        'dist/js/app.js',
        'resources/js/lib/three.min.js',
        'resources/js/lib/cannon.min.js',
        'resources/js/lib/teal.js',
        'resources/js/lib/dice.js',
        'resources/js/lib/main.js'
    ], 'dist/js/tool.js')
   .sass('resources/sass/tool.scss', 'dist/css');
