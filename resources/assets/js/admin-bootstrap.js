try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
    require('./admin/adminlte.js');
    require('./admin/select2.js');

    require('./admin/pages/news.js');
    require('./admin/pages/artists.js');
    require('./admin/pages/albums.js');
    require('./admin/pages/interviews.js');
    require('./admin/pages/articles.js');
    require('./admin/pages/lyrics.js');

    require('./admin/admin.js');
} catch (e) {}

