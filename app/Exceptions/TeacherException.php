<?php


namespace App\Exceptions;

use Exception;

class TeacherException extends Exception
{

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->view('errors.custom',['errors' =>  ['You have no classes handled']],500);
    }
}
