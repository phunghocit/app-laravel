<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAncol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // public function getAge($birthdate = '0000-00-00') {
    //     if ($birthdate == '0000-00-00') return 'Unknown';
    
    //     $bits = explode('-', $birthdate);
    //     $age = date('Y') - $bits[0] - 1;
    
    //     $arr[1] = 'm';
    //     $arr[2] = 'd';
    
    //     for ($i = 1; $arr[$i]; $i++) {
    //         $n = date($arr[$i]);
    //         if ($n < $bits[$i])
    //             break;
    //         if ($n > $bits[$i]) {
    //             ++$age;
    //             break;
    //         }
    //     }
    //     return $age;
    // }
    public function handle(Request $request, Closure $next): Response
    {
        // Auth::user()->dob
        if (!Auth::check() ) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        
        $now = Carbon::now();
        $dob= Carbon::createFromFormat('Y-m-d H:i:s',$user->dob);
        $age =$now ->diffInYears($dob);
        if($age <=18){
            return redirect()->route('home');
        }
        return $next($request);

    }
}
