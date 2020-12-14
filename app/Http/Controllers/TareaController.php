<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Entrega;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all();
        return view('admin.tareas.index', ['tareas'=>$tareas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = new Tarea();
        $tarea->title = $request->title;
        $tarea->description = $request->description;
        $tarea->date = $request->date;
        $tarea->time = $request->time;

        if($request->hasfile('file')){
            $file = $request ->file;
            $name = $file->getClientOriginalName();
            $destination = public_path().'/tareas';
            $file->move($destination, $name);
            $tarea->file=$name;

        }
        $tarea->save();
        return redirect('admintareas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareas = Tarea::findOrFail($id);
        $entregas = Entrega::all();
        return view('admin.tareas.show', ['tarea'=>$tareas,'entregas'=>$entregas ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('admin.tareas.edit', ['tarea'=>$tarea]);
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
        $tarea = Tarea::findOrFail($id);

        $tarea->title = $request->title;
        $tarea->description = $request->description;
        $tarea->date = $request->date;
        $tarea->time = $request->time;

        if($request->hasfile('file')){
            $file = $request ->file;
            $name = $file->getClientOriginalName();
            $destination = public_path().'/tareas';
            $file->move($destination, $name);
            $tarea->file=$name;

        }
        $tarea->update();
        return redirect('admintareas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea=Tarea::findOrFail($id);
        $tarea->delete();
        return back();
    }
}
