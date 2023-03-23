<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return response()->json($games);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'date_de_sortie' => 'required|date',
            'content' => 'required'
        ]);
    
        // On crée un nouveau jeu
        $game = Game::create([
            'name' => $request->name,
            'date_de_sortie' => $request->date_de_sortie,
            'content' => $request->content
        ]);
    
        // On retourne les informations du nouveau jeu en JSON
        return response()->json($game, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return response()->json($game);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'date_de_sortie' => 'required|date',
            'content' => 'required'
        ]);
    
        // On modifie les informations du jeu
        $game->update([
            'name' => $request->name,
            'date_de_sortie' => $request->date_de_sortie,
            'content' => $request->content
        ]);
    
        // On retourne les informations du jeu en JSON
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        // On supprime du jeu
        $game->delete();

        // On retourne la réponse JSON
        return response()->json();
    }

}
