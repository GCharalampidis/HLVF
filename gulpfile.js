var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'jquery': 'node_modules/jquery/dist',
    'jqueryui': 'node_modules/jquery-ui-dist',
    'jqueryuitp': 'node_modules/jquery-ui-touch-punch-c',
    'bootstrap': 'node_modules/bootstrap/dist',
    'fontawesome': 'node_modules/font-awesome',
    'dragula': 'node_modules/dragula/dist',
    'assets': 'resources/assets'
};

elixir(function(mix) {

    mix.copy(paths.bootstrap + '/fonts/**', 'public/build/fonts')
        .copy(paths.fontawesome + '/fonts/**', 'public/build/fonts')

        .styles([
            paths.bootstrap + "/css/bootstrap.min.css",
            paths.dragula + "/dragula.min.css",
            paths.fontawesome + "/css/font-awesome.min.css",
            paths.jqueryui + "/jquery-ui.min.css",
            paths.assets + "/css/metisMenu.css",
            paths.assets + "/css/sb-admin-2.css",
            paths.assets + "/css/blog-post.css"
        ], 'public/css/all.css', './')

        .scripts([
            paths.jquery + "/jquery.min.js",
            paths.jqueryui + "/jquery-ui.min.js",
            paths.jqueryuitp + "/jquery.ui.touch-punch.min.js",
            paths.bootstrap + "/js/bootstrap.min.js",
            paths.dragula + "/dragula.min.js",
            paths.assets + "/js/metisMenu.js",
            paths.assets + "/js/sb-admin-2.js",
            paths.assets + "/js/scripts.js"
        ], 'public/js/all.js', './');

    mix.version([
        'public/css/all.css',
        'public/js/all.js'
    ]);
});
