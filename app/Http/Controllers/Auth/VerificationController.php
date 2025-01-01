<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Handle the email verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @param  string  $hash
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request, $id, $hash)
    {
        $user = \App\Models\User::findOrFail($id);

        if ($user->hasVerifiedEmail() || !hash_equals($hash, sha1($user->getEmailForVerification()))) {
            return redirect()->route('User.index');
        }

        $user->markEmailAsVerified();

        event(new Verified($user));

        return redirect()->route('User.index')->with('verified', true);
    }
}
