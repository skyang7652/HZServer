<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//API-----------------
//




//
//

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('bid/{bid}/complete',[
    'uses' => 'BidController@complete',
    'as'   => 'bid.complete',
    ]);


Route::get('employee/search',
    [
        'uses' =>'EmployeeController@search',
        'as'   =>'employee.search',
    
    ]);
    
Route::post('branch/{bid_Id}',
    [
        'uses' => 'BranchController@index',
        'as'   => 'branch.index'
    ]);
    
Route::get('branch/create',
    [
        'uses' => 'BranchController@create',
        'as'   => 'branch.create'
    ]); 
    
Route::delete('branch/{bid_Id}/{branch_Id}',
    [
        'uses' => 'BranchController@destroy',
        'as'   => 'branch.delete'
    ]);

Route::get('pay/create',
    [
        'uses' => 'PayController@create',
        'as'   => 'pay.create'
    ]);
    
Route::post('pay/insert',
    [
        'uses' => 'PayController@insert',
        'as'   => 'pay.insert'
    ]);
Route::post('pay/getEmployee',  
    [
        'uses' => 'PayController@getEmployee',
        'as'   => 'pay.getEmployee'
    ]);
    
Route::get('pay/retrieval/{id}',  
    [
        'uses' => 'PayController@retrieval',
        'as'   => 'pay.retrieval'
    ]);
    
Route::post('pay/billing',  
    [
        'uses' => 'PayController@billing',
        'as'   => 'pay.billing'
    ]);

Route::get('pay',function(){
    return view('pays/page');
});


Route::group(['prefix'=>'api'], function(){

        Route::get('checkLink',function(){

            return 'success';
        });

        Route::group(['prefix'=>'employee'], function(){

            Route::post('new',
                [
                    'uses' => 'ApiEmployeeController@employeeNew',
                    'as'   => 'api.employee.new'
                ]
            );

            Route::get('/',
                [
                    'uses' => 'ApiEmployeeController@employeeData',
                    'as'   => 'api.employee'
                ]
            
            );
            Route::get('{id}',
                [
                    'uses' => 'ApiEmployeeController@getEmployee',
                    'as'   => 'api.employee.get'
                ]
            );

            Route::post('update',
                [
                    'uses' => 'ApiEmployeeController@employeeUpdate',
                    'as'   => 'api.employee.update'
                ]
            
            );

            Route::post('delete',
                [
                    'uses' => 'ApiEmployeeController@employeeDelete',
                    'as'   => 'api.employee.delete'
                ]
            
            );
        });

         Route::group(['prefix'=>'bid'], function(){

            Route::post('new',
                [
                    'uses' => 'ApiBidController@bidNew',
                    'as'   => 'api.bid.new'
                ]
            
            );

             Route::post('edit',
                [
                    'uses' => 'ApiBidController@bidUpdate',
                    'as'   => 'api.bid.edit'
                ]
            
            );


            Route::get('/name/{type}',
                [
                'uses' => 'ApiBidController@getBidName',
                'as'   => 'api.bid'
                ]);
            Route::get('/one/{id}',
                [
                    'uses' => 'ApiBidController@getBidNameOne',
                    'as'   => 'api.bid.get'
                ]);
            Route::post('delete',
                [
                    'uses' => 'ApiBidController@bidDelete',
                    'as'   => 'api.bid.delete'
                ]);

         });
        Route::group(['prefix' => 'pay'], function() {

            Route::post('/insert',
                [
                'uses' => 'ApiPayController@insert',
                'as'   => 'api.pay.insert'
                ]);
            Route::get('/{id}',
                [
                'uses' => 'ApiPayController@getPay',
                'as'   => 'api.pay.getPay'
                ]);
            Route::get('/detail/{id}',
                [
                'uses' => 'ApiPayController@getDetailPay',
                'as'   => 'api.pay.getDetailPay'
                ]);
            Route::post('billing',
                [
                    'uses' => 'ApiPayController@billing',
                    'as'   => 'api.pay.billing'
                ]);
            Route::get('/getPayData/{id}',
                [
                    'uses' => 'ApiPayController@getPayData',
                    'as'   => 'api.pay.getPayData'
                ]);
             Route::post('updatePay',
                [
                    'uses' => 'ApiPayController@updatePay',
                    'as'   => 'api.pay.updatePay'
                ]);
             Route::post('deletePay',
                [
                    'uses' => 'ApiPayController@deletePay',
                    'as'   => 'api.pay.deletePay'
                ]);
           
            //
        });


});
    
Route::resource('bid','BidController');

Route::resource('employee','EmployeeController');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
