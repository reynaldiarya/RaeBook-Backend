<?php

use App\Http\Controllers\BookApiController;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\DetailBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'The provided credentials are incorrect.'
        ]);
    }

    $user = User::where('email', $request->email)->first();
    // $user->tokens()->delete();
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => 'error',
            'message' => 'The provided credentials are incorrect.',
        ]);
    }

    return response()->json([
        'status' => 'success',
        'token' => $user->createToken('eBook')->plainTextToken,
        'name' => $user->name,
        'user_id' => $user->id,
        'imgUrl' => $user->imgUrl
    ]);
});

Route::post('/register', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Email has been used'
        ]);
    }

    $user = User::create($request->all());
    return response()->json([
        'status' => 'success',
        'token' => $user->createToken('eBook')->plainTextToken,
        'name' => $user->name,
        'user_id' => $user->id,
        'imgUrl' => $user->imgUrl
    ]);
});

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $message = $request->user()->currentAccessToken()->delete();
    if ($message == 1) {
        $message = 'Logout Successful';
    }
    return response()->json([
        'status' => 'success',
        'message' => 'tes'
    ]);
});

Route::middleware('auth:sanctum')->get('/book', [BookApiController::class, 'getbooks']);

Route::middleware('auth:sanctum')->get('/my-book', [BookApiController::class, 'getmybooks']);

Route::middleware('auth:sanctum')->post('/add-book', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'user_id' => 'required',
        'book_id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'There is an error'
        ]);
    }

    DetailBook::create($request->all());
    return response()->json([
        'status' => 'success',
        'message' => 'Successfully added to the library',
    ]);
});

Route::middleware('auth:sanctum')->post('/remove-book', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'user_id' => 'required',
        'book_id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'There is an error'
        ]);
    }

    DetailBook::where('book_id', $request->book_id)->where('user_id', $request->user_id)->delete();
    return response()->json([
        'status' => 'success',
        'message' => 'Successfully remove from library',
    ]);
});

Route::middleware('auth:sanctum')->post('/update-profile', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'imgUrl' => 'required',
        'user_id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'There is an error'
        ]);
    }

    $user = User::where('id', $request->user_id)->first();
    $user->update([
        'imgUrl' => $request->imgUrl,
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Successfully add photo profile',
    ]);
});