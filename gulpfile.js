const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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
process.env.DISABLE_NOTIFIER = true;

let dirs = {
    'vendor': "./resources/assets/vendor",
    'public': "./public/vendor",
}

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');

// Compile AdminLTE scripts to single file.
    mix.scripts([
        dirs.vendor + '/jquery/dist/jquery.js',
        dirs.vendor + '/bootstrap/dist/js/bootstrap.js',
        dirs.vendor + '/AdminLTE/plugins/fastclick/fastclick.js',
        dirs.vendor + '/AdminLTE/dist/js/app.js',
        dirs.vendor + '/AdminLTE/plugins/sparkline/jquery.sparkline.js',
        dirs.vendor + '/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        dirs.vendor + '/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        dirs.vendor + '/AdminLTE/plugins/slimScroll/jquery.slimscroll.js',
        dirs.vendor + '/AdminLTE/plugins/chartjs/Chart.js',
        dirs.vendor + '/AdminLTE/plugins/datatables/jquery.dataTables.min.js',
        dirs.vendor + '/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js',
        dirs.public + '/datatables/buttons.server-side.js'
    ], 'public/js/admin.js');

    // Compile AdminLTE to single file.
    mix.styles([
        dirs.vendor + '/bootstrap/dist/css/bootstrap.css',
        dirs.vendor + '/font-awesome/css/font-awesome.css',
        dirs.vendor + '/Ionicons/css/ionicons.css',
        dirs.vendor + '/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        dirs.vendor + '/AdminLTE/dist/css/AdminLTE.css',
        dirs.vendor + '/AdminLTE/dist/css/skins/_all-skins.css',
        dirs.vendor + '/AdminLTE/plugins/datatables/dataTables.bootstrap.css',
        dirs.vendor + '/AdminLTE/plugins/datatables/jquery.dataTables.min.css',
    ], 'public/css/admin.css')

    // Copy AdminLTE assets.
    mix.copy(dirs.vendor + '/font-awesome/fonts', 'public/fonts')
       .copy(dirs.vendor + '/Ionicons/fonts', 'public/fonts')
       .copy(dirs.vendor + '/bootstrap/dist/fonts', 'public/fonts')
       .copy(dirs.vendor + '/AdminLTE/dist/img', 'public/img')
});
