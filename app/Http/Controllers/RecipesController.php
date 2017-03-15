<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Medicina;
use App\Recipe;
use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $cita = Cita::findOrFail($id);
        return view('recipe.create', ['cita'=>$cita]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'observaciones' => 'required|max:300',
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }
        try {
            \DB::beginTransaction();
            Recipe::create([
                'observaciones' => $request->input('observaciones'),
                'cita_id' => $request->input('cita_id'),
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

    public function recipescita($id)
    {
        $citas = Cita::findorFail($id);
        $recipes= Recipe::where('cita_id', $id)->paginate(10);
        return view('recipe.recipescita',['recipes'=>$recipes, 'citas'=>$citas]);

    }

    public function asigne($id)
    {
        $recipe = Recipe::findOrFail($id);
        $medicinas = Medicina::all();
        return view('recipe.asignarmedicinas', ['recipe' => $recipe, 'medicinas' => $medicinas]);
    }

    public function asignarmedicina(Request $request, $id)
    {

        $recipe = Recipe::findOrFail($id);
        $recipe->medicina()->attach($request->input('medicinas'));
        return redirect('/home')->with('mensaje', 'Medicinas agregadas al recipe Satisfactoriamente');
    }

}
