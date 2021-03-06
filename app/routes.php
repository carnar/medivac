<?php

Route::get('/login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::to($facebook->getLoginUrl($params));
});

Route::get('/login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');
 
    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();
 
    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');
 
    $me = $facebook->api('/me');
 
    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {
 
        $user = new User;
        $user->name = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['id'].'/picture';
        // $user->photo = 'https://graph.facebook.com/'.$me['id'].'/picture?type=large';
 
        $user->save();
 
        $profile = new Profile();
        $profile->uid = $uid;
        //$profile->username = $me['username'];
        $profile = $user->profiles()->save($profile);
    }
 
    $profile->access_token = $facebook->getAccessToken();
    $profile->save();
 
    $user = $profile->user;
 
    Auth::login($user);
 
    return Redirect::to('/')->with('message', 'Logged in with Facebook');
});

Route::get('/', 'HomeController@index');
Route::get('/leaderboard', 'LeaderboardController@index');
Route::get('scores', 'ScoreController@index');
Route::get('scores/edit', 'ScoreController@edit');
Route::post('scores', 'ScoreController@update');
Route::get('rules', function(){ return View::make('share.rules'); });
Route::resource('/prediction', 'PredictionController',
                array('only' => array('create', 'store', 'show')));

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});