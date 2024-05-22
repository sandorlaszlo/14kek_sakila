<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    public function actors()
    {
        return DB::table('actor')->get();
    }

    public function actorsByFirstname($firstname)
    {
        // SELECT * from actor
        // WHERE actor.first_name = "NICK";

        return DB::table('actor')
                ->where('first_name', '=', $firstname)
                ->get();
    }

    public function actorsCount()
    {
        //SELECT count(*) as count_actors from actor;
        return DB::table('actor')->count();
        // $result = DB::raw('SELECT count(*) as count_actors from actor');
        // return $result;
    }

    public function actorsCountByFirstname($firstname)
    {
        //SELECT count(*) as count_actors from actor
        //where first_name = 'nick';
        return DB::table('actor')
                ->where('first_name', $firstname)
                ->count();
    }

    public function actorsAllCountByFirstname()
    {
        // SELECT first_name ,count(*) as count_actors
        // FROM actor
        // GROUP BY first_name
        // ORDER BY count_actors DESC;
        return DB::table('actor')
                    ->select('first_name', DB::raw('count(*) as count_actors'))
                    ->groupBy('first_name')
                    //->orderBy('count_actors', 'desc')
                    ->orderByDesc('count_actors')
                    ->get();
    }

    public function actorsByFullname($firstname, $lastname)
    {
        //SELECT * from actor
        //Where first_name = 'nick' and last_name = 'WAHLBERG';
        return DB::table('actor')
                ->where('first_name', $firstname)
                ->where('last_name', $lastname)
                //->orWhere()
                ->get();
    }

    public function actorsByTwoFirstnames($firstname1, $firstname2)
    {
        //SELECT * from actor
        //Where first_name = 'nick' or first_name = 'ed';
        return DB::table('actor')
            ->where('first_name', $firstname1)
            ->orWhere('first_name', $firstname2)
            ->get();
    }

    public function store(Request $request)
    {

        // return $request->all();
        // return $request->first_name;
        $actor = new Actor;
        $actor->first_name = $request->first_name;
        $actor->last_name = $request->last_name;
        $actor->save();

        return $actor;
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();
        return response()->noContent();
    }

    public function update(Request $request, Actor $actor)
    {
        $actor->first_name = $request->first_name;
        $actor->last_name = $request->last_name;
        $actor->save();
        return $actor;
    }
}
