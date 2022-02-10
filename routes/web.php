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

//ログイン・新規登録画面
Route::get('Diary/signup', 'DiaryController@signup');


Route::group(['middleware' => 'auth'], function(){
    //アプリトップ画面
    Route::get('Diary/top', 'DiaryController@top')->name("Diary.top");
    
    //キャラクター登録画面
    Route::get('Diary/nickname', 'DiaryController@charactercreate')->name("Diary.charactercreate");
    Route::post('Diary/characterstore', 'DiaryController@characterstore')->name("Diary.characterstore");;
    Route::get('Diary/characterconfirm', 'DiaryController@characterconfirm');
    Route::post('Diary/charactersend', 'DiaryController@charactersend');
    
    //アイコン登録画面
    Route::get('Diary/iconselect', 'DiaryController@iconselect');
    Route::post('Diary/iconstore', 'DiaryController@iconstore')->name("Diary.iconstore");
    Route::get('Diary/iconconfirm', 'DiaryController@iconconfirm');
    Route::post('Diary/iconsend', 'DiaryController@iconsend');
    
    //体重を記録
    Route::get('Diary/weight_record', 'WeightRecordController@weight_record')->name("Diary.weight_record");
    Route::post('Diary/weight_record_save', 'WeightRecordController@weight_record_save')->name("Diary.weight_record_save");
    Route::get('Diary/weightresult', 'WeightRecordController@weight_result')->name("Diary.weight_result");
    
    //食事を記録   
    Route::get('Diary/food_record', 'FoodRecordController@food_record')->name("Diary.food_record");
    Route::post('Diary/food_record_save', 'FoodRecordController@food_record_save')->name("Diary.food_record_save");

    //日記を記録
    Route::get('Diary/diary_history', 'DiaryRecordController@diary_history')->name("Diary.diary_history");
    Route::get('Diary/diary_record', 'DiaryRecordController@diary_record')->name("Diary.diary_record");
    Route::post('Diary/diary_create', 'DiaryRecordController@diary_create')->name("Diary.diary_create");
    Route::get('Diary/diary_create_confirm', 'DiaryRecordController@diary_create_confirm')->name("Diary.diary_create_confirm");
    Route::post('Diary/diary_save', 'DiaryRecordController@diary_save')->name("Diary.diary_save");
    Route::get('Diary/{id}/diary_edit', 'DiaryRecordController@diary_edit')->name("Diary.diary_edit");
    Route::post('Diary/diary_update/{id}', 'DiaryRecordController@diary_update')->name("Diary.diary_update");
    Route::get('Diary/{id}/diary_show', 'DiaryRecordController@diary_show')->name("Diary.diary_show");

    Route::get('Diary/history', 'DiaryController@history');
    Route::get('Diary/history_show', 'DiaryController@history_show')->name("Diary.history_show");
    
    //友達の日記を閲覧、コメント記録
    //友達の日記を閲覧、コメント記録
    Route::get('Diary/frend_diary', 'DiaryRecordController@frend_diary')->name("Diary.frend_diary");
    Route::get('Diary/{id}/frend_diary_show', 'DiaryRecordController@frend_diary_show')->name("Diary.frend_diary_show");
    Route::post('Diary/diary_comment_save/{id}', 'DiaryRecordController@diary_comment_save')->name("Diary.diary_comment_save");
    Route::get('Diary/{id}/diary_comment_edit', 'DiaryRecordController@diary_comment_edit')->name("Diary.diary_comment_edit");
    Route::post('Diary/diary_comment_update/{id}', 'DiaryRecordController@diary_comment_update')->name("Diary.diary_comment_update");
    Route::post('Diary/diary_comment_destroy/{id}', 'DiaryRecordController@diary_comment_destroy')->name("Diary.diary_comment_destroy");
    
    //友達検索、追加
    Route::get('Diary/friend_find', 'DiaryRecordController@friend_find')->name("Diary.friend_find");
    Route::post('Diary/friend_search', 'DiaryRecordController@friend_search')->name("Diary.friend_search");
    Route::post('Diary/friend_add', 'DiaryRecordController@friend_add')->name("Diary.friend_add");
    Route::get('Diary/friend_list', 'DiaryRecordController@friend_list')->name("Diary.friend_list");
    Route::post('destroy/{id}', 'DiaryRecordController@friend_destroy')->name("Diary.friend_destroy");
    
    Route::get('Diary/sample', 'DiaryController@sample');
    Route::get('Diary/icon', 'DiaryController@iconselect');
}); 
    


Route::post('Diary/samplesave', 'DiaryController@samplesave')->name("Diary.samplesave");

//Route::get('todo/index', 'TodoController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
