<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::create(array_merge(
            $request->only('name', 'email'),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'Ви успішно зареєстрованні. Можете увійти на сайт з допомогою пошти і пароля.'
        ], 200);
    }
}
