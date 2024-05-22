<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    function filmsByCost($min, $max)
    {
        // SELECT * from film
        // WHERE replacement_cost BETWEEN 25 AND 30
        // ORDER BY title;

        return DB::table('film')
                ->whereBetween('replacement_cost', [$min, $max])
                ->orderBy('title')
                ->get();
    }

    function filmsWithActors()
    {
        // SELECT film.title, first_name, last_name from film
        // join film_actor on film.film_id = film_actor.film_id
        // join actor on actor.actor_id = film_actor.actor_id
        // ORDER BY title;

        return DB::table('film')
            ->join('film_actor', 'film.film_id', '=', 'film_actor.film_id')
            ->join('actor', 'actor.actor_id', '=', 'film_actor.actor_id')
            ->select('film.title', 'actor.first_name', 'actor.last_name')
            ->orderBy('title')
            ->get();
    }
}
