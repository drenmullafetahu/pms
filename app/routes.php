<?php
use App\Http\Requests\AppRequest;
use App\Http\Requests;

$routeLanguage = (isMultilingual()) ? '/' . appLanguage() : '/';

Route::get('/', function () {
    return redirect('/en/login');
});

Route::group(['prefix' => $routeLanguage, array('before' => 'auth'), 'namespace' => 'Controllers', 'middleware' => 'web',
], function ($router) {

    Route::get('/login', 'Auth\AuthController@login');
    Route::get('/register', 'Auth\RegisterController@register');
    Route::post('/register/newUser', 'Auth\RegisterController@store');
    Route::post('/handleLogin', 'Auth\AuthController@handleLogin');

//  Route::get('/home','UsersController@home',['middleware'=>'auth']);

    Route::group(['middleware' => 'auth',
    ], function ($router) {

        Route::resource('/dashboard', 'DashboardController');
        Route::resource('/profile', 'ProfilesController');
        Route::resource('/tasks', 'TasksController');
        Route::resource('/activities', 'ActivitiesController');
        Route::resource('/task-responses', 'TaskResponsesController');
        Route::resource('/profile/uploadCoverImage', 'ProfilesController@uploadCoverImage');
        Route::resource('/profile/uploadProfilePicture', 'ProfilesController@uploadProfilePicture');
        Route::post('/tasks/edit/{id}', 'TasksController@edit');
        Route::post('/tasks-response', 'TaskResponsesController@store');
        Route::post('/tasks-reject/{id}', 'TaskResponsesController@reject');
        Route::post('/tasks-approve/{id}', 'TaskResponsesController@approve');
        Route::resource('/manage/tasks', 'ManageTasksController');
        Route::resource('/manage/activities', 'ManageActivitiesController');
        Route::resource('/projects', 'ProjectsController', ['middleware' => 'auth']);
        Route::resource('/calendar', 'CalendarController', ['middleware' => 'auth']);
        Route::resource('/treeView', 'TreeController@index', ['middleware' => 'auth']);
        Route::resource('/privacy', 'PrivacyController@index', ['middleware' => 'auth']);
        //        Social
        Route::resource('/social', 'SocialController@index');

//        Route::get('/chat/{username}',function($username){
//           return View::make('dashboard.templates.chats')->with('username',$username);
//        });
        Route::post('/chat/sendMessage', array('uses' => 'ChatController@sendMessage'));
        Route::post('/chat/isTyping', array('uses' => 'ChatController@isTyping'));
        Route::post('/chat/notTyping', array('uses' => 'ChatController@notTyping'));
        Route::post('/chat/retrieveChatMessages', array('uses' => 'ChatController@retrieveChatMessages'));
        Route::post('/chat/retrieveChatHistory', array('uses' => 'ChatController@retrieveChatHistory'));
        Route::post('/chat/retrieveTypingStatus', array('uses' => 'ChatController@retrieveTypingStatus'));
        Route::post('/chat/createChatRoom', array('uses' => 'ChatController@createChatRoom'));
        Route::post('/chat/retrieveUnreadMessages', array('uses' => 'ChatController@retrieveUnreadMessages'));
        Route::post('/chat/makeSeen', array('uses' => 'ChatController@makeSeen'));

//Tree
        Route::get('/getTree', array('uses' => 'GetTreeController@getTreee'));
        Route::post('/task/getClicked', array('uses' => 'TreeController@getClicked'));
        Route::get('/task/getClicked', array('uses' => 'TreeController@getClicked'));

//Todo
        Route::post('/todo/saveTodo', array('uses' => 'TodoController@saveTodo'));
        Route::post('/todo/deleteTodo', array('uses' => 'TodoController@deleteTodo'));

//        kanaban
        Route::post('/todo/sendToDoing', array('uses' => 'KanabanController@sendToDoing'));
        Route::post('/todo/sendToToDo', array('uses' => 'KanabanController@sendToToDo'));
//        Route::post('/todo/sendToPending',array('uses'=>'KanabanController@sendToPending'));
        Route::post('/todo/sendToDone', array('uses' => 'KanabanController@sendToDone'));

//        Route::post('/user/edit/{id}', 'UsersController@edit', ['middleware' => 'auth']);

//        Charts
        Route::get('/Chart/getPersonalizedMonthly', array('uses' => 'ChartsController@getPersonalizedMonthly'));
        Route::get('/Chart/getPersonalizedMonthly/notStarted', array('uses' => 'ChartsController@getPersonalizedMonthly_notStarted'));
        Route::get('/Chart/getPersonalizedMonthly/doing', array('uses' => 'ChartsController@getPersonalizedMonthly_InProgress'));
        Route::get('/Chart/getPersonalizedMonthly/completed', array('uses' => 'ChartsController@getPersonalizedMonthly_Completed'));
        Route::get('/Chart/getPersonalizedMonthlyCompared/notStarted', array('uses' => 'ChartsController@getPersonalizedMonthlyCompared_notStarted'));


//        Facebook
        Route::get('/redirect', 'SocialAuthController@redirect');
        Route::get('/callback', 'SocialAuthController@callback');


        Route::get('/logout', 'Auth\AuthController@logout', ['middleware' => 'auth']);

        Route::get('/permissions/edit/{id}', 'PermissionsController@edit');


    });


//    Route::group(['prefix' => '/staff'], function ($router) {
//        Route::resource('/dashboard', 'DashboardController');
//        Route::resource('/profile', 'ProfilesController', ['middleware' => 'role:staff']);
//
//    });
});


?>