<?php

namespace Tutorpia\Http\Controllers;



use Tutorpia\Myinput;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;


class MyinputController extends Controller
{
    public function index()
    {
        // get all the myinputs
        $myinputs = Myinput::all();
        // load the view and pass the myinputs
        return View::make('myinputs.index')
            ->with('myinputs', $myinputs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // load the create form (app/views/myinputs/create.blade.php)
        return View::make('myinputs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate

        $this->validate($request, [
            'string'       => 'required',
            'email'      => 'required|email',
            'integer' => 'required|numeric']);


        // store
        Myinput::create([
            'string'      =>  $request->string,
            'email'      =>  $request->email,
            'integer' =>  $request->integer,
        ]);
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // get the myinput
        $myinput = Myinput::find($id);

        // show the view and pass the myinput to it
        return View::make('myinputs.show')
            ->with('myinput', $myinput);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // get the myinput
        $myinput = Myinput::find($id);

        // show the edit form and pass the myinput
        return View::make('myinputs.edit')
            ->with('myinput', $myinput);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'string'       => 'required',
            'email'      => 'required|email',
            'integer' => 'required|numeric']);

        $myinput = Myinput::find($id);
        $myinput->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // delete
        $myinput = Myinput::find($id);
        $myinput->delete();
        // redirect
        return back();
    }
}
