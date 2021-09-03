<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Office;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public $invitation;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest');
        $invitation = Invitation::where('invitation_token', $request->get('token'))->first();
        $this->invitation = $invitation;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showRegistrationForm()
    {
        $invitation = $this->invitation;

        if (! $this->invitation) {
            return redirect()->route('login')
                ->with('error', 'A valid token is required to register');
        }

        return view('auth.register', compact('invitation'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $invitation = $this->invitation;

        $username = generate_username($invitation->email);
        $officeId = $invitation->office_id;

        $user = User::create([
            'email'         => $invitation->email,
            'office_id'     => $officeId,
            'username'      => $username,
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'password'      => Hash::make($data['password']),
        ]);

        Office::find($officeId)->members()->create([
            'member_id'     => $user->id,
            'accepted_at'   => now(),
            'invited_by'    => $invitation->invited_by,
            'token'         => $invitation->invitation_token,
            'expired_at'    => null,
        ]);

        return $user;
    }
}
