<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('hGetCurYearAndMonth')) {
    /**
     * Returns a human readable file size
     *
     * @param integer $bytes
     * Bytes contains the size of the bytes to convert
     *
     * @param integer $decimals
     * Number of decimal places to be returned
     *
     * @return string a string in human readable format
     *
     * */
     function hGetCurYearAndMonth(){
        $date = \Carbon\Carbon::now();

        $year = $date->year;
        $month = $date->month;


        if($month >= 6 && $month <= 10) $semester = 1; elseif($month == 3 || $month == 4) $semester = 3; else $semester = 2;

        return compact('year','semester');
    }
}

if (!function_exists('routeAuthChecker')) {
    /**
     * Returns a human readable file size
     *
     * @param integer $bytes
     * Bytes contains the size of the bytes to convert
     *
     * @param integer $decimals
     * Number of decimal places to be returned
     *
     * @return string a string in human readable format
     *
     * */
    function routeAuthChecker($system_role_id){
        //2 - beadle , 4 - teacher , 3 - osa , 1 - none
        switch($system_role_id){
            case 2:
                $route = 'studentDashboard';
                break;
            case 4:
                $route = 'teacherDashboard';
                break;
            case 1:
                Auth::logout();
                return redirect()->route('login')->withErrors(['access' =>['Your account has no access to this application.']]);
                break;
            default:
                Auth::logout();
                $route = 'login';
        }
        return redirect()->route($route);
    }
}
