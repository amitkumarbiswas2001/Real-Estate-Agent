<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Locations
    Route::post('locations/media', 'LocationApiController@storeMedia')->name('locations.storeMedia');
    Route::apiResource('locations', 'LocationApiController');

    // Properties
    Route::post('properties/media', 'PropertyApiController@storeMedia')->name('properties.storeMedia');
    Route::apiResource('properties', 'PropertyApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Currencies
    Route::apiResource('currencies', 'CurrencyApiController');

    // Bookings
    Route::post('bookings/media', 'BookingApiController@storeMedia')->name('bookings.storeMedia');
    Route::apiResource('bookings', 'BookingApiController');

    // Transactions
    Route::apiResource('transactions', 'TransactionApiController');

    // Property Comments
    Route::apiResource('property-comments', 'PropertyCommentApiController');

    // Faq Categories
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Questions
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // Property Categories
    Route::post('property-categories/media', 'PropertyCategoryApiController@storeMedia')->name('property-categories.storeMedia');
    Route::apiResource('property-categories', 'PropertyCategoryApiController');
});
