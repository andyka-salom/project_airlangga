<?php

namespace App\Http\Controllers;
use app\Models\jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{   
        public function show(jasa $jasa)
        {
            $provider = $jasa->provider;
            return view('jasa.show', compact('jasa', 'provider'));
        }

}
