<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Http\Requests\Authentication\SignUpRequest;
use App\Http\Requests\Authentication\SignInRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthenticationController extends Controller
{
    public function signUpForm()
    {
        return view('Backend.Authentication.register');
    }

    public function signUpStore(SignUpRequest $request)
    {
        try {
            $user = new User;
            $user->name = $request->fullName;
            $user->email = $request->emailAddress;
            $user->contact_number = $request->contactNumber;
            $user->password = Hash::make($request->password);
            $user->role_id = 5;
            if ($user->save())
                return redirect('login')->with('success', 'Registration Completed');
            else
                return redirect('login')->with('error', 'Data is not Saved. Please try again');
        } catch (Exception $e) {
            // dd($e);
            return redirect('login')->with('error', 'Registration Failed. Please try again');
        }
    }

    public function signInForm()
    {
        return view('Backend.Authentication.login');
    }

    public function signInCheck(SignInRequest $request)
    {
        try {
            $user = User::where('email', $request->username)->orWhere('contact_number', $request->username)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $this->setSession($user);
                    return redirect()->route('dashboard')->with('success', 'Successfully Loged In');
                } else
                    return redirect()->route('login')->with('error', 'Incorrect Password! Login Failed.');
            } else
                return redirect()->route('login')->with('error', 'Invalid Username. Please try again');
        } catch (Exception $e) {
            dd($e);
            return redirect('login')->with('error', 'Login Failed. Please try again');
        }
    }

    public function setSession($user)
    {
        return request()->session()->put([
            'userId' => encryptor('encrypt', $user->id),
            'userName' => encryptor('encrypt', $user->name),
            'role' => encryptor('encrypt', $user->role->type),
            'roleIdentity' => encryptor('encrypt', $user->role->identity),
            'language' => encryptor('encrypt', $user->language),
            'image' => $user->image ?? 'No Image Found'
        ]);
    }

    public function signOut()
    {
        request()->session()->flush();
        return redirect('login')->with('danger', 'Succesfully Logged Out');
    }
}
