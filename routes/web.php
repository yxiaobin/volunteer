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

Route::get('/', function () {
    return view('welcome');
});

//-----------------------LoginController------------------------------------//
//登录界面
Route::get('/',"LoginController@index");
//登出界面
Route::get('/logout',"LoginController@logout");

//验证登录
Route::post('/login',"LoginController@login");
//注册逻辑页面
Route::post('/register',"LoginController@register");
//发送邮件
Route::get('/email/{address}',"LoginController@sendMail");



//----------------------------YzmController--------------------------------------//
//获得验证码
Route::get('/yzm',"YzmController@index");

//---------------------------FileUploadController
//上传图片
Route::post('/fileupload',"FileUploadController@up");
//
Route::get('/getImage/{path}/{name}',"FileUploadController@getImage");

//---------------------------ManagerController-------------------------------------//
//后台管理界面
Route::get('/manager',"ManagerController@index");
//主页
Route::get('/home',"ManagerController@home");
//新增志愿活动页面
Route::get('/newhelp',"ManagerController@newhelp");
//志愿者活动查询
Route::get('/activity',"ManagerController@activity");
//我的求助
Route::get('/myhelp',"ManagerController@myhelp");
//活动详情
Route::get('/activity/{obj}',"ManagerController@show");
//报名
Route::get('/join/{obj}',"ManagerController@join");
//我参加过的活动
Route::get('/myactivity',"ManagerController@myactivity");

//------------------------HelpController--------------------------------------------//
//新添加请求帮助逻辑
Route::post('/newhelp',"HelpController@add");
//修改活动页面
Route::get('/editactivity/{obj}',"HelpController@editindex");
Route::post('/editactivity',"HelpController@editstore");
//删除活动页面
Route::get('/deleteactivity/{obj}',"HelpController@delete");
//模糊搜索
Route::post('/searchactivity',"HelpController@search");
//------------------------UserController------------------------------------------//
//用户认证页面
route::get("/token","UserController@index");
//用户信息页面
route::get("/info","UserController@info");
//明星志愿者
route::get("/rank","UserController@rank");
//用户信息修改界面
route::post("/info","UserController@update");
//用户审核
route::post("/token","UserController@token");
//--------------------------TeamController---------------------------------------//
//团队广场
route::get("/list","TeamController@index");
//我的团队
route::get("/myteam","TeamController@myteam");
//创建团队
route::get("/createteam","TeamController@create");
route::post("/createteam","TeamController@store");

//----------------------------LuntanController------------------------------------//
//论坛列表
route::get("/bbs","LuntanController@list");
//论坛详情
route::get("/bbsshow/{obj}","LuntanController@show");
//新建帖子
route::get("/newbbs","LuntanController@new");
route::post("/newbbs","LuntanController@store");
//我的帖子
route::get("/mybbs","LuntanController@mybbs");
//回复帖子
route::post("/huifu","LuntanController@huifu");
//删除帖子
route::get("/bbsdelete/{obj}","LuntanController@delete");



//-------------------------------RootController-----------------------------------//
//用户验证
route::get("/tokenuser","RootController@tokenuser");
route::get("/tokenuser/{user}/{msg}","RootController@storeuser");

//团队验证
route::get("/tokenteam","RootController@tokenteam");
route::get("/tokenteam/{team}/{msg}","RootController@storeteam");
//活动验证
route::get("/tokenhelp","RootController@tokenhelp");
route::get("/tokenhelp/{help}/{msg}","RootController@storehelp");


//--------------------------------CatrgoryController------------------------------//
route::get("/category","CategoryController@index");
route::get("/newcategory","CategoryController@new");
route::post("/newcategory","CategoryController@newstore");
route::get("/editcategory/{category}","CategoryController@edit");
route::post("/editcategory","CategoryController@editstore");
route::get("/deletecategory/{category}","CategoryController@delete");
