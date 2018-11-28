<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','testController@index');

Route::get('admindashboard','adminController@admindashboard');




Route::get('ckan','ckanController@ckan');
Route::get('ckanapi','ckanController@ckanapi');


Route::get('form',function(){
   return view('form');
});

Route::get('data',function(){
   return view('partials.data');
});

Route::get('admin',function(){
   return view('login');
});

Route::post('admin_login','testController@admin_login');



Route::post('search','ckanController@search');

Route::post('datasetcreate','ckanController@datasetcreate');

Route::get('allpublications','testController@allpublications');
Route::get('allpublication/{id}','testController@allpublication');

Route::get('publicationbydate/{id}','testController@publicationbydate');
Route::get('publicationbydate/{period}/{id}','testController@publicationbydat');

Route::get('sub_sectors/{id}','testController@sub_sectors');

Route::get('main_menu/{id}','testController@main_menu');
Route::get('sub_menu/{id}','testController@sub_menu');


Route::get('allnews','testController@allnews');
Route::get('singlenews/{id}','testController@singlenews');

Route::get('getsubcategories/{id}','testController@getsubcategories');

Route::get('department/{id}','testController@department');

Route::get('images','testController@images');
Route::get('all_images/{id}','testController@all_images');

Route::get('videos','testController@videos');

Route::get('all_videos/{id}','testController@all_videos');


Route::get('about_kpbos','testController@about_kpbos');
Route::get('hierarchy','testController@hierarchy');
Route::get('contact_us','testController@contact_us');

Route::get('all_achievements','testController@all_achievements');


//For admin //

Route::get('forget','adminController@forget');
Route::Resource('menus','menuController');
Route::post('editmenus','menuController@editmenus');

Route::Resource('submenus','submenuController');
Route::post('editsubmenus','submenuController@editsubmenus');


Route::Resource('categories','categoryController');
Route::post('editcategory','categoryController@editcategory');


Route::Resource('subcategories','subcategoryController');
Route::post('editsubcategory','subcategoryController@editsubcategory');


Route::Resource('publications_uploads','publicationuploadController');
Route::post('update_publications_uploads','publicationuploadController@update_publications_uploads');


Route::Resource('news','newsController');
Route::post('editnews','newsController@editnews');

Route::Resource('about_us','about_usController');
Route::post('editaboutus','about_usController@editaboutus');


Route::Resource('about_us_section','about_us_sectionController');
Route::post('editaboutus_section','about_us_sectionController@editaboutus_section');


Route::Resource('media','mediaController');
Route::get('media_images','mediaController@media_images');
Route::get('media_videos','mediaController@media_videos');

Route::Resource('organization_hierarchy','organization_hierarchyController');
Route::post('edit_member','organization_hierarchyController@edit_member');

Route::Resource('achievements','achievementController');
Route::post('edit_achievements','achievementController@edit_achievements');




//Route::post('datasetcreate', function (Request $request) {
//
//    return CkanApi::dataset()->create([
//        'name' => 'dataset_by_bilawal_api-' . rand(1, 1000),
//        'title' => 'dataset_by_bilawal_api-' . rand(1, 1000),
//        'owner_org' => 'bos',
//        'private' => 'False',
//    ]);
//
//});