<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    function countriesInV4()
    {
        //SELECT * from country
        //WHERE country in ('Hungary', 'Slovakia', 'Czech Republic', 'Poland');

        $countries = ['Hungary', 'Slovakia', 'Czech Republic', 'Poland'];
        return DB::table('country')
                ->select('country_id', 'country')
                ->whereIn('country', $countries)
                ->get();
    }
}
