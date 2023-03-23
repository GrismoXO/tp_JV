<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100'
        ]);
    
        // On crée une nouvelle catégorie
        $category = Category::create([
            'name' => $request->name
        ]);
    
        // On retourne les informations de la nouvelle catégorie en JSON
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $this->validate($request, [
            'name' => 'required|max:100',
            'game_id' => 'required'
        ]);
    
        // On modifie les informations de la catégorie
        $category->update([
            'name' => $request->name,
            'game_id' => $request->game_id
        ]);
    
        // On retourne les informations du jeu en JSON
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
                // On supprime du jeu
                $category->delete();

                // On retourne la réponse JSON
                return response()->json();
    }


}
