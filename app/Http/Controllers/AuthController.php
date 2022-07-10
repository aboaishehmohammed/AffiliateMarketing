<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthValidations\LoginRequest;
use App\Http\Requests\AuthValidations\RegisterRequest;
use App\Models\Image;
use App\Models\Referral_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    /**
     *  Login form view
     */
    public function index()
    {
        $data = Referral_user::selectRaw('DATE(created_at) as x, COUNT(*) as y')
            ->groupBy('x')
//            ->where('created_at', '>', Carbon::now()->subWeek())
            ->get();

        return view('index', ['data' => $data]);
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    /**
     * Login a user process
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, true)) {
            if (auth()->user()->role)
            return redirect()->route('admin.index');

            return redirect()->route('wallet.show');
        }

        $errors = new MessageBag([
            'email' => 'Incorrect email or password',
        ]);

        return back()->withErrors($errors)->withInput();
    }
    /**
     * Register Form view
     */
    public function registerPage(Request $request)
    {
        if (isset($request->referral) && !empty($request->referral))
            $referral_user = User::where('referral_link', '=', $request->referral)->first();

        if (isset($referral_user) && !empty($referral_user)) {
            ++$referral_user->views;
            $referral_user->save();
        }

        return view('auth.register', ['referral' => $request->referral ?? '']);
    }

    /**
     * Register a user process
     */
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'birthdate' => $request->birthdate,
                'password' => bcrypt($request->password),
                'referral_link' => User::randomLink(30),
            ]);

            $user->wallet()->create();

            $user->categories()->sync([1, 2, 3, 4, 5, 6]);


            $fileName = $request->image->getClientOriginalName();

            Image::create([
                'name' => $fileName,
                'path' => $request->image->storeAs('images', $fileName, 'public'),
                'imagable_id' => $user->id,
                'imagable_type' => User::class,
            ]);

            if (isset($request->referral_user_link) && !empty($request->referral_user_link))
                $referral_user = User::where('referral_link', '=', $request->referral_user_link)->first();
            if (isset($referral_user) && !empty($referral_user)) {
                Referral_user::create([
                    'user_id' => $user->id,
                    'referral_id' => $referral_user->id,
                ]);
            }
            Auth::attempt($request->only(['email', 'password']), true);

            return redirect()->route('home');

        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Logout a user
     */
    public function logout()
    {
        session()->flush();
        auth()->logout();

        return redirect(route('home'));
    }
}
