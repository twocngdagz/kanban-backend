<?php

use App\Card;
use App\Column;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/columns', function (Request $request) {
    return Column::with('cards')->get();
});

Route::post('/columns', function (Request $request) {
    foreach ($request->all() as $column) {
        foreach ($column['cards'] as $card) {
            if ($card['column_id'] != $column['id']) {
                $card = Card::findOrFail($card['id']);
                $card->column_id = $column['id'];
                $card->save();
            }
        }
    }

    return Column::with('cards')->get();
});

Route::put('/card', function (Request $request) {
    $card = Card::findOrFail($request->get('id'));
    $card->title = $request->get('title');
    $card->description = $request->get('description');
    $card->save();
    return $card;
});

Route::post('/card', function (Request $request) {
    return Card::create([
        'title' => $request->get('title'),
        'description' => $request->get('description'),
        'column_id' => $request->get('column')
    ]);
});

Route::delete('/column/{column}', function (Column $column) {
    return $column->delete();
});
