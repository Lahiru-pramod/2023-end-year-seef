<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MakeSecureSLRDEndPoint extends Controller
{

    public function main(Request $request)
    {

        $response = Http::withHeaders(['x-api-key' => $request->header()['x-api-key']])->get('https://slrw-api.sanmark.dev/get-schedule');

        if ($response->successful() && $response->clientError() == false) {
            return ($response->json());
        } else {
            return "Something went wrong please try again!";
        }
    }
}
