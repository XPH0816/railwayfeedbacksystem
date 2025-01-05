<?php

namespace App\Http\Controllers;

use App\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Fortify;

class RegisteredUserController extends \Laravel\Fortify\Http\Controllers\RegisteredUserController
{
    public function store(
        Request $request,
        CreatesNewUsers $creator
    ): RegisterResponse {
        if (config('fortify.lowercase_usernames')) {
            $request->merge([
                Fortify::username() => Str::lower($request->{Fortify::username()}),
            ]);
        }

        $input = $request->all();
        if (empty($input['password'])) {
            $input['password'] = Str::password();
            $input['password_confirmation'] = $input['password'];
            event(new Registered($user = $creator->create($input), $input['password']));
        } else {
            event(new Registered($user = $creator->create($input), "Your created password"));
            $this->guard->login($user, $request->boolean('remember'));
        }

        return app(RegisterResponse::class);
    }
}
