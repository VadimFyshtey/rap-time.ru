<?php

// Home
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

// Artists
Route::get('/artist/{alias}', ['uses' => 'ArtistsController@view', 'as' => 'artistView']);
Route::get('/artists/search', ['uses' => 'ArtistsController@search', 'as' => 'artistSearch']);
Route::get('/artists/albums/{alias}', ['uses' => 'ArtistsController@artistAlbums', 'as' => 'artistAlbums']);
Route::get('/artists/interviews/{alias}', ['uses' => 'ArtistsController@artistInterviews', 'as' => 'artistInterviews']);
Route::get('/artists/news/{alias}', ['uses' => 'ArtistsController@artistNews', 'as' => 'artistNews']);
Route::get('/artists/lyrics/{alias}', ['uses' => 'ArtistsController@artistLyrics', 'as' => 'artistLyrics']);
Route::get('/artists/{sort?}/{by?}', ['uses' => 'ArtistsController@index', 'as' => 'artistIndex']);
Route::get('/artists/category/{alias}/{id}/{sort?}/{by?}', ['uses' => 'ArtistsController@category', 'as' => 'artistCategory']);

// News
Route::get('/news/tag/{tag}', ['uses' => 'NewsController@tags', 'as' => 'newsTags']);
Route::get('/news/search', ['uses' => 'NewsController@search', 'as' => 'newsSearch']);
Route::get('/news/{alias}/{id}', ['uses' => 'NewsController@view', 'as' => 'newsView']);
Route::get('/news/{sort?}/{by?}', ['uses' => 'NewsController@index', 'as' => 'newsIndex']);
Route::get('/news/category/{alias}/{id}/{sort?}/{by?}', ['uses' => 'NewsController@category', 'as' => 'newsCategory']);

// Interviews
Route::get('/interview/{alias}/{id}', ['uses' => 'InterviewsController@view', 'as' => 'interviewView']);
Route::get('/interview/search', ['uses' => 'InterviewsController@search', 'as' => 'interviewSearch']);
Route::get('/interviews/{sort?}/{by?}', ['uses' => 'InterviewsController@index', 'as' => 'interviewIndex']);
Route::get('/interviews/category/{alias}/{id}/{sort?}/{by?}', ['uses' => 'InterviewsController@category', 'as' => 'interviewCategory']);

// Articles
Route::get('/article/tag/{tag}', ['uses' => 'ArticlesController@tags', 'as' => 'articleTags']);
Route::get('/article/search', ['uses' => 'ArticlesController@search', 'as' => 'articleSearch']);
Route::get('/article/{alias}/{id}', ['uses' => 'ArticlesController@view', 'as' => 'articleView']);
Route::get('/articles/{sort?}/{by?}', ['uses' => 'ArticlesController@index', 'as' => 'articleIndex']);

// Albums
Route::get('/album/{alias}/{id}', ['uses' => 'AlbumsController@view', 'as' => 'albumView']);
Route::get('/albums/search', ['uses' => 'AlbumsController@search', 'as' => 'albumSearch']);
Route::get('/albums/{sort?}/{by?}', ['uses' => 'AlbumsController@index', 'as' => 'albumIndex']);
Route::get('/albums/category/{alias}/{id}/{sort?}/{by?}', ['uses' => 'AlbumsController@category', 'as' => 'albumCategory']);

// Lyrics
Route::get('/lyrics/{alias}/{id}', ['uses' => 'LyricsController@view', 'as' => 'lyricsView']);
Route::get('/lyrics/search', ['uses' => 'LyricsController@search', 'as' => 'lyricsSearch']);
Route::get('/lyrics/{sort?}/{by?}', ['uses' => 'LyricsController@index', 'as' => 'lyricsIndex']);
Route::get('/lyrics/category/{alias}/{id}/{sort?}/{by?}', ['uses' => 'LyricsController@category', 'as' => 'lyricsCategory']);

// Rating
Route::post('/rating/news', ['uses' => 'RatingController@rateNews', 'as' => 'rateNews']);
Route::post('/rating/artist', ['uses' => 'RatingController@rateArtist', 'as' => 'rateArtist']);
Route::post('/rating/album', ['uses' => 'RatingController@rateAlbum', 'as' => 'rateAlbum']);
Route::post('/rating/article', ['uses' => 'RatingController@rateArticle', 'as' => 'rateArticle']);
Route::post('/rating/interview', ['uses' => 'RatingController@rateInterview', 'as' => 'rateInterview']);
Route::post('/rating/lyrics', ['uses' => 'RatingController@rateLyrics', 'as' => 'rateLyrics']);

// Auth
Auth::routes();
Route::get('logout', ['uses' => '\App\Http\Controllers\Auth\LoginController@logout', 'as' => 'logout']);

// Auth social
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// Contact
Route::post('/contact', ['uses' => 'HomeController@contact', 'as' => 'contact']);

// Project
Route::get('/info', ['uses' => 'HomeController@info', 'as' => 'info']);
Route::get('/contact', ['uses' => 'HomeController@contactPage', 'as' => 'contactPage']);
Route::get('/advertising', ['uses' => 'HomeController@advertising', 'as' => 'advertising']);
Route::get('/copyright', ['uses' => 'HomeController@copyright', 'as' => 'copyright']);
Route::get('/embit88', ['uses' => 'HomeController@by88', 'as' => 'embit88']);

// Profile
Route::get('/profile/{id}', ['uses' => 'ProfileController@index', 'as' => 'profileIndex', 'middleware' => 'auth']);
Route::post('/profile/update/{id}', ['uses' => 'ProfileController@update', 'as' => 'profileUpdate', 'middleware' => 'auth']);

// Comments
Route::post('/comment/artist', ['uses' => 'CommentsController@artistCommentSave', 'as' => 'artistCommentSave', 'middleware' => 'auth']);
Route::post('/comment/news', ['uses' => 'CommentsController@newsCommentSave', 'as' => 'newsCommentSave', 'middleware' => 'auth']);
Route::post('/comment/album', ['uses' => 'CommentsController@albumCommentSave', 'as' => 'albumCommentSave', 'middleware' => 'auth']);
Route::post('/comment/lyrics', ['uses' => 'CommentsController@lyricsCommentSave', 'as' => 'lyricsCommentSave', 'middleware' => 'auth']);
Route::post('/comment/interview', ['uses' => 'CommentsController@interviewCommentSave', 'as' => 'interviewCommentSave', 'middleware' => 'auth']);
Route::post('/comment/article', ['uses' => 'CommentsController@articleCommentSave', 'as' => 'articleCommentSave', 'middleware' => 'auth']);

// Comments delete
Route::get('/comment/delete/artist/{id}', ['uses' => 'CommentsController@artistCommentDelete', 'as' => 'artistCommentDelete', 'middleware' => 'administrator']);
Route::get('/comment/delete/news/{id}', ['uses' => 'CommentsController@newsCommentDelete', 'as' => 'newsCommentDelete', 'middleware' => 'administrator']);
Route::get('/comment/delete/album/{id}', ['uses' => 'CommentsController@albumCommentDelete', 'as' => 'albumCommentDelete', 'middleware' => 'administrator']);
Route::get('/comment/delete/lyrics/{id}', ['uses' => 'CommentsController@lyricsCommentDelete', 'as' => 'lyricsCommentDelete', 'middleware' => 'administrator']);
Route::get('/comment/delete/interview/{id}', ['uses' => 'CommentsController@interviewCommentDelete', 'as' => 'interviewCommentDelete', 'middleware' => 'administrator']);
Route::get('/comment/delete/article/{id}', ['uses' => 'CommentsController@articleCommentDelete', 'as' => 'articleCommentDelete', 'middleware' => 'administrator']);

// Admin
Route::prefix('admin')->group(function () {

    Route::get('', ['uses' => 'Admin\DashboardController@index', 'as' => 'adminDashboardIndex', 'middleware' => 'administrator']);

    // Admin News
    Route::prefix('news')->group(function () {
        Route::get('', ['uses' => 'Admin\NewsController@index', 'as' => 'adminNewsIndex', 'middleware' => 'administrator']);
        Route::get('/add', ['uses' => 'Admin\NewsController@add', 'as' => 'adminNewsAdd', 'middleware' => 'administrator']);
        Route::post('/create', ['uses' => 'Admin\NewsController@create', 'as' => 'adminNewsCreate', 'middleware' => 'administrator']);
        Route::get('/edit/{id}', ['uses' => 'Admin\NewsController@edit', 'as' => 'adminNewsEdit', 'middleware' => 'administrator']);
        Route::post('/update/{id}', ['uses' => 'Admin\NewsController@update', 'as' => 'adminNewsUpdate', 'middleware' => 'administrator']);
        Route::get('/delete/{id}', ['uses' => 'Admin\NewsController@delete', 'as' => 'adminNewsDelete', 'middleware' => 'administrator']);
        Route::get('/search/{q?}', ['uses' => 'Admin\NewsController@search', 'as' => 'adminNewsSearch', 'middleware' => 'administrator']);
        Route::get('/filter/{value?}', ['uses' => 'Admin\NewsController@filter', 'as' => 'adminNewsFilter', 'middleware' => 'administrator']);
    });

    // Admin Artists
    Route::prefix('artists')->group(function () {
        Route::get('', ['uses' => 'Admin\ArtistsController@index', 'as' => 'adminArtistIndex', 'middleware' => 'administrator']);
        Route::get('/add', ['uses' => 'Admin\ArtistsController@add', 'as' => 'adminArtistAdd', 'middleware' => 'administrator']);
        Route::post('/create', ['uses' => 'Admin\ArtistsController@create', 'as' => 'adminArtistCreate', 'middleware' => 'administrator']);
        Route::get('/edit/{id}', ['uses' => 'Admin\ArtistsController@edit', 'as' => 'adminArtistEdit', 'middleware' => 'administrator']);
        Route::post('/update/{id}', ['uses' => 'Admin\ArtistsController@update', 'as' => 'adminArtistUpdate', 'middleware' => 'administrator']);
        Route::get('/delete/{id}', ['uses' => 'Admin\ArtistsController@delete', 'as' => 'adminArtistDelete', 'middleware' => 'administrator']);
        Route::get('/search/{q?}', ['uses' => 'Admin\ArtistsController@search', 'as' => 'adminArtistSearch', 'middleware' => 'administrator']);
        Route::get('/filter/{value?}', ['uses' => 'Admin\ArtistsController@filter', 'as' => 'adminArtistFilter', 'middleware' => 'administrator']);
    });

    // Admin Albums
    Route::prefix('albums')->group(function () {
        Route::get('', ['uses' => 'Admin\AlbumsController@index', 'as' => 'adminAlbumIndex', 'middleware' => 'administrator']);
        Route::get('/add', ['uses' => 'Admin\AlbumsController@add', 'as' => 'adminAlbumAdd', 'middleware' => 'administrator']);
        Route::post('/create', ['uses' => 'Admin\AlbumsController@create', 'as' => 'adminAlbumCreate', 'middleware' => 'administrator']);
        Route::get('/edit/{id}', ['uses' => 'Admin\AlbumsController@edit', 'as' => 'adminAlbumEdit', 'middleware' => 'administrator']);
        Route::post('/update/{id}', ['uses' => 'Admin\AlbumsController@update', 'as' => 'adminAlbumUpdate', 'middleware' => 'administrator']);
        Route::get('/delete/{id}', ['uses' => 'Admin\AlbumsController@delete', 'as' => 'adminAlbumDelete', 'middleware' => 'administrator']);
        Route::get('/search/{q?}', ['uses' => 'Admin\AlbumsController@search', 'as' => 'adminAlbumSearch', 'middleware' => 'administrator']);
        Route::get('/filter/{value?}', ['uses' => 'Admin\AlbumsController@filter', 'as' => 'adminAlbumFilter', 'middleware' => 'administrator']);
    });

    // Admin Interviews
    Route::prefix('interviews')->group(function () {
        Route::get('', ['uses' => 'Admin\InterviewsController@index', 'as' => 'adminInterviewIndex', 'middleware' => 'administrator']);
        Route::get('/add', ['uses' => 'Admin\InterviewsController@add', 'as' => 'adminInterviewAdd', 'middleware' => 'administrator']);
        Route::post('/create', ['uses' => 'Admin\InterviewsController@create', 'as' => 'adminInterviewCreate', 'middleware' => 'administrator']);
        Route::get('/edit/{id}', ['uses' => 'Admin\InterviewsController@edit', 'as' => 'adminInterviewEdit', 'middleware' => 'administrator']);
        Route::post('/update/{id}', ['uses' => 'Admin\InterviewsController@update', 'as' => 'adminInterviewUpdate', 'middleware' => 'administrator']);
        Route::get('/delete/{id}', ['uses' => 'Admin\InterviewsController@delete', 'as' => 'adminInterviewDelete', 'middleware' => 'administrator']);
        Route::get('/search/{q?}', ['uses' => 'Admin\InterviewsController@search', 'as' => 'adminInterviewSearch', 'middleware' => 'administrator']);
        Route::get('/filter/{value?}', ['uses' => 'Admin\InterviewsController@filter', 'as' => 'adminInterviewFilter', 'middleware' => 'administrator']);
    });

    // Admin Articles
    Route::prefix('articles')->group(function () {
        Route::get('', ['uses' => 'Admin\ArticlesController@index', 'as' => 'adminArticleIndex', 'middleware' => 'administrator']);
        Route::get('/add', ['uses' => 'Admin\ArticlesController@add', 'as' => 'adminArticleAdd', 'middleware' => 'administrator']);
        Route::post('/create', ['uses' => 'Admin\ArticlesController@create', 'as' => 'adminArticleCreate', 'middleware' => 'administrator']);
        Route::get('/edit/{id}', ['uses' => 'Admin\ArticlesController@edit', 'as' => 'adminArticleEdit', 'middleware' => 'administrator']);
        Route::post('/update/{id}', ['uses' => 'Admin\ArticlesController@update', 'as' => 'adminArticleUpdate', 'middleware' => 'administrator']);
        Route::get('/delete/{id}', ['uses' => 'Admin\ArticlesController@delete', 'as' => 'adminArticleDelete', 'middleware' => 'administrator']);
        Route::get('/search/{q?}', ['uses' => 'Admin\ArticlesController@search', 'as' => 'adminArticleSearch', 'middleware' => 'administrator']);
        Route::get('/filter/{value?}', ['uses' => 'Admin\ArticlesController@filter', 'as' => 'adminArticleFilter', 'middleware' => 'administrator']);
    });

    // Admin Lyrics
    Route::prefix('lyrics')->group(function () {
        Route::get('', ['uses' => 'Admin\LyricsController@index', 'as' => 'adminLyricsIndex', 'middleware' => 'administrator']);
        Route::get('/add', ['uses' => 'Admin\LyricsController@add', 'as' => 'adminLyricsAdd', 'middleware' => 'administrator']);
        Route::post('/create', ['uses' => 'Admin\LyricsController@create', 'as' => 'adminLyricsCreate', 'middleware' => 'administrator']);
        Route::get('/edit/{id}', ['uses' => 'Admin\LyricsController@edit', 'as' => 'adminLyricsEdit', 'middleware' => 'administrator']);
        Route::post('/update/{id}', ['uses' => 'Admin\LyricsController@update', 'as' => 'adminLyricsUpdate', 'middleware' => 'administrator']);
        Route::get('/delete/{id}', ['uses' => 'Admin\LyricsController@delete', 'as' => 'adminLyricsDelete', 'middleware' => 'administrator']);
        Route::get('/search/{q?}', ['uses' => 'Admin\LyricsController@search', 'as' => 'adminLyricsSearch', 'middleware' => 'administrator']);
        Route::get('/filter/{value?}', ['uses' => 'Admin\LyricsController@filter', 'as' => 'adminLyricsFilter', 'middleware' => 'administrator']);
    });

    // Admin Comments
    Route::prefix('comments')->group(function () {

        // News
        Route::get('news', ['uses' => 'Admin\CommentsController@indexNews', 'as' => 'adminCommentNewsIndex', 'middleware' => 'superAdmin']);
        Route::get('/news/delete/{id}', ['uses' => 'Admin\CommentsController@deleteNews', 'as' => 'adminCommentNewsDelete', 'middleware' => 'superAdmin']);

        // Artists
        Route::get('artists', ['uses' => 'Admin\CommentsController@indexArtist', 'as' => 'adminCommentArtistIndex', 'middleware' => 'superAdmin']);
        Route::get('/artists/delete/{id}', ['uses' => 'Admin\CommentsController@deleteArtist', 'as' => 'adminCommentArtistDelete', 'middleware' => 'superAdmin']);

        // Albums
        Route::get('albums', ['uses' => 'Admin\CommentsController@indexAlbum', 'as' => 'adminCommentAlbumIndex', 'middleware' => 'superAdmin']);
        Route::get('/albums/delete/{id}', ['uses' => 'Admin\CommentsController@deleteAlbum', 'as' => 'adminCommentAlbumDelete', 'middleware' => 'superAdmin']);

        // Lyrics
        Route::get('lyrics', ['uses' => 'Admin\CommentsController@indexLyrics', 'as' => 'adminCommentLyricsIndex', 'middleware' => 'superAdmin']);
        Route::get('/lyrics/delete/{id}', ['uses' => 'Admin\CommentsController@deleteLyrics', 'as' => 'adminCommentLyricsDelete', 'middleware' => 'superAdmin']);

        // Interviews
        Route::get('interviews', ['uses' => 'Admin\CommentsController@indexInterview', 'as' => 'adminCommentInterviewIndex', 'middleware' => 'superAdmin']);
        Route::get('/interviews/delete/{id}', ['uses' => 'Admin\CommentsController@deleteInterview', 'as' => 'adminCommentInterviewDelete', 'middleware' => 'superAdmin']);

        // Articles
        Route::get('articles', ['uses' => 'Admin\CommentsController@indexArticle', 'as' => 'adminCommentArticleIndex', 'middleware' => 'superAdmin']);
        Route::get('/articles/delete/{id}', ['uses' => 'Admin\CommentsController@deleteArticle', 'as' => 'adminCommentArticleDelete', 'middleware' => 'superAdmin']);
    });

    // Admin Users
    Route::prefix('users')->group(function () {
        Route::get('', ['uses' => 'Admin\UsersController@index', 'as' => 'adminUserIndex', 'middleware' => 'superAdmin']);
        Route::get('/edit/{id}', ['uses' => 'Admin\UsersController@edit', 'as' => 'adminUserEdit', 'middleware' => 'superAdmin']);
        Route::post('/update/{id}', ['uses' => 'Admin\UsersController@update', 'as' => 'adminUserUpdate', 'middleware' => 'superAdmin']);
        Route::get('/delete/{id}', ['uses' => 'Admin\UsersController@delete', 'as' => 'adminUserDelete', 'middleware' => 'superAdmin']);
        Route::get('/search/{q?}', ['uses' => 'Admin\UsersController@search', 'as' => 'adminUserSearch', 'middleware' => 'superAdmin']);
    });

    // Admin Roles
    Route::prefix('roles')->group(function () {
        Route::get('', ['uses' => 'Admin\RolesController@index', 'as' => 'adminRoleIndex', 'middleware' => 'superAdmin']);
        Route::get('/add', ['uses' => 'Admin\RolesController@add', 'as' => 'adminRoleAdd', 'middleware' => 'superAdmin']);
        Route::post('/create', ['uses' => 'Admin\RolesController@create', 'as' => 'adminRoleCreate', 'middleware' => 'superAdmin']);
        Route::get('/edit/{id}', ['uses' => 'Admin\RolesController@edit', 'as' => 'adminRoleEdit', 'middleware' => 'superAdmin']);
        Route::post('/update/{id}', ['uses' => 'Admin\RolesController@update', 'as' => 'adminRoleUpdate', 'middleware' => 'superAdmin']);
        Route::get('/delete/{id}', ['uses' => 'Admin\RolesController@delete', 'as' => 'adminRoleDelete', 'middleware' => 'superAdmin']);
    });

    // Admin Categories
    Route::prefix('categories')->group(function () {
        Route::get('', ['uses' => 'Admin\CategoriesController@index', 'as' => 'adminCategoryIndex', 'middleware' => 'superAdmin']);
        Route::get('/add', ['uses' => 'Admin\CategoriesController@add', 'as' => 'adminCategoryAdd', 'middleware' => 'superAdmin']);
        Route::post('/create', ['uses' => 'Admin\CategoriesController@create', 'as' => 'adminCategoryCreate', 'middleware' => 'superAdmin']);
        Route::get('/edit/{id}', ['uses' => 'Admin\CategoriesController@edit', 'as' => 'adminCategoryEdit', 'middleware' => 'superAdmin']);
        Route::post('/update/{id}', ['uses' => 'Admin\CategoriesController@update', 'as' => 'adminCategoryUpdate', 'middleware' => 'superAdmin']);
        Route::get('/delete/{id}', ['uses' => 'Admin\CategoriesController@delete', 'as' => 'adminCategoryDelete', 'middleware' => 'superAdmin']);
    });

    // Clear Cache
    Route::get('/clear/cache', ['uses' => 'Admin\DefaultAdminController@clearCache', 'as' => 'adminClearCache', 'middleware' => 'administrator']);
});