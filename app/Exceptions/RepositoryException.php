<?php

namespace App\Exceptions;

use Exception;

class RepositoryException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'uri' => $request->getUri(),
            'error' => $this->getMessage()
        ], $this->getCode());
    }
}