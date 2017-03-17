<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Historia;
use App\Medicina;
use App\Recipe;
use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;

class RecipesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        if (!Auth::user()->hasPermissionTo('ModuloFarmaceuta'))
            abort(403);

        $recipes = Recipe::despachados()->paginate(10);
        return view ('recipe.index',['recipes' => $recipes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (!Auth::user()->hasPermissionTo('CrearRecipe'))
            abort(403);


        $historia = Historia::findOrFail($id);
        return view('recipe.create', ['historia'=>$historia]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            \DB::beginTransaction();
            Recipe::create([
                'observaciones' => $request->input('observaciones'),
                'historia_id' => $request->input('historia_id'),
            ]);
        } catch (\Exception $v) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/home')->with('mensaje', 'Recipe Agregado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (!Auth::user()->hasPermissionTo('DespachoMedicina'))
            abort(403);

        $recipe = Recipe::findOrFail($id);
        $medicinas= Medicina::all();
        $farmaceuta= Auth::user();
        return view('Recipe.edit', ['recipe'=>$recipe, 'medicina'=>$medicinas, 'farmaceuta'=>$farmaceuta]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            \DB::beginTransaction();

            $recipe = Recipe::findOrFail($id);
            $recipe->update([
                'fecha' => $request->input('fecha'),
                'farmaceuta_id' => $request->input('farmaceuta'),
                'status' => $request->input('status'),
            ]);
        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/home')->with('mensaje', 'Recipe despachado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reciphistory($id)

    {
        if (!Auth::user()->hasPermissionTo('RecipeLocal'))
            abort(403);


        $historia = Historia::findorFail($id);
        $recipes= Recipe::where('historia_id', $id)->paginate(10);
        return view('recipe.recipeshistoria',['recipes'=>$recipes, 'historia'=>$historia]);

    }


    public function asigne($id)
    {
        if (!Auth::user()->hasPermissionTo('AsignarMedicina'))
            abort(403);


        $recipe = Recipe::findOrFail($id);
        $medicinas = Medicina::all();
        return view('recipe.asignarmedicinas', ['recipe' => $recipe, 'medicinas' => $medicinas]);
    }

    public function asignarmedicina(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('AsignarMedicina'))
            abort(403);

        $recipe = Recipe::findOrFail($id);
        $recipe->medicina()->attach($request->input('medicinas'));
        return redirect('/home')->with('mensaje', 'Medicinas agregadas al recipe Satisfactoriamente');
    }

    public function recipedehistoria($id)
    {
        if (!Auth::user()->hasPermissionTo('RecipeGlobal'))
            abort(403);


        $recipes= Recipe::where('historia_id', $id)->paginate(10);
        return view('recipe.recipedehistoria',['recipes'=>$recipes]);


    }

}
