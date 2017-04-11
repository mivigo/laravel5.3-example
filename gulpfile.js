var elixir = require('laravel-elixir');
var coffee = require('gulp-coffee');

// elixir(function (mix){
//
//     //noinspection JSUnresolvedFunction
//     mix.sass('app.scss');
//     // mix.sass('app.scss').coffee();
//
//     mix.styles ([
//         'vendor/normalize.css',
//         'app.css'
//     ], 'public/output/final.css', 'public/css');
//     // ], null, 'public/css');
//
//     // mix.scripts([
//     //     'vendor/jquery.js',
//     //     'main.js',
//     //     'coupon.js'
//     // ], 'public/output/scripts.js', 'public/js');
//
// });


// elixir (function (mix) {
//
//     // mix.phpUnit().phpSpec();
//     // mix.phpUnit();
//
// });


elixir (function (mix) {

    mix.sass('app.scss', 'resources/css');

    mix.styles ([
        'libs/bootstrap.min.css',
        'app.css',
        'libs/select2.min.css'
    ]);

    mix.scripts([
        'libs/jquery.js',
        'libs/select2.min.js'], 'public/js/output.js');

    // mix.version('public/css/all.css');

});

