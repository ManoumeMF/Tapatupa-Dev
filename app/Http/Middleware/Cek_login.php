<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        //$user = Auth::user();

        $userRole = Auth::user()->roles->roleName;

        //dd(Auth::user()->roles);
        //$dataUser = DB::select('CALL view_userDataById(:id)', ['id' => $user->id]);
        //$users = $dataUser[0];

        //dd($users);

        /*if($dataUser[0]['roleName'] == $roles)
            return $next($request);*/

        if ($userRole == $roles)
            return $next($request);


        return redirect('login')->with('error', "Anda Tidak Punya Akses Untuk Login");
    }
}
