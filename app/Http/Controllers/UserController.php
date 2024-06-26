<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Models\User;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Actions\CanonicalizeUsername;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Features;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /*protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }*/
    public function index()
    {
        //
    }

    public function consultar(Request $request){
        try{
            if($request->has("query")){
                $item = User::where('name','LIKE','%'.$request->get('query').'%')->get();
                return response()->json([
                    "isRequest"=> true,
                    "success" => true,
                    "messageError" => false,
                    "message" => "Consulta con : ".$request->get('query'),
                    "data" => $item
                ]);
            }else{
                $item = User::all();
                return response()->json([
                    "isRequest"=> true,
                    "success" => true,
                    "messageError" => false,
                    "message" => "Todos los items",
                    "data" => $item
                ]);
            }
        }catch(\Exception $e){
            $message = $e->getMessage();
            $code = $e->getCode();
            return response()->json([
                "isRequest"=> true,
                "success" => false,
                "messageError" => true,
                "message" => $message." Code: ".$code,
                "data" => []
            ]);
        }   
    }

    public function save(array $input){
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'nick' => $input['nick'],
            'password' => Hash::make($input['password']),
            'is_habilitado' => $input['is_habilitado'],
            'is_empresa' => $input['is_empresa'],
        ]);
    }
    public function registerOnApi(StoreUserRequest $request){
        //$user = $this->save($request->all());
        try{
            $user = $this->save($request->all());
            return response()->json([
                "isRequest"=> true,
                "success" => $user != null,
                "messageError" => $user != null,
                "message" => $user != null ? "Registro completo" : "Error!!!",
                "data" => $user
            ]);
        }catch(\Exception $e){
            $message = $e->getMessage();
            $code = $e->getCode();
            return response()->json([
                "isRequest"=> true,
                "success" => false,
                "messageError" => true,
                "message" => $message." Code: ".$code,
                "data" => []
            ]);
        }
    }
    public function loginOnApi(Request $request){
        $credentials = $request->validate([
            'nick' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('nick', $request->nick)->first();
        //return $user->email;
        if ($user && Hash::check($request->password, $user->password)) {
            $userData = array(
                'email' => $user->email,
                'password' => $request->password
            );
            if (Auth::attempt($userData)) {
                //$request->session()->regenerate();
                Auth::login($user);
                $userLogin = auth()->user();
                return response()->json($userLogin);
            }    
            return response()->json(["respuesta" => "no paso la auth"]);
        }
        return response()->json(["respuesta" => "password es incorrecto"]);
        
        /*$user = User::where('nick', $request->nick)->first();
 
        if ($user &&
            Hash::check($request->password, $user->password)) {
            return $user;
        }
        return $user;
        Fortify::authenticateThrough(function (Request $request) {
            return array_filter([
                    //config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
                    config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
                    config('fortify.lowercase_usernames') ? CanonicalizeUsername::class : null,
                    Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
                    AttemptToAuthenticate::class,
                    PrepareAuthenticatedSession::class,
            ]);
        });*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}