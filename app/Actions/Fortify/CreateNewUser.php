<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'access_auth' => ['required'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        // 入力された値をコード値に変換する処理を追加
        switch ($input['access_auth']) {
            case "User":
                $input['access_auth'] = "0";
                break;
            case "Manager":
                $input['access_auth'] = "1";
                break;
            case "Admin":
                $input['access_auth'] = "9";
                break;
            default:
                $input['access_auth'] = "0";
        }

        \Log::debug($input);

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'access_auth' => $input['access_auth'] // テーブルへ書き込む処理を追加
        ]);
    }
}
