<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Tables\States;
use App\Forms\StateForm;
use Illuminate\Http\Request;
use App\Forms\UpdateStateForm;
use ProtoneMedia\Splade\Facades\Splade;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.states.index',[
            'states' => States::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.states.create',[
            'form' => StateForm::class
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,StateForm $form)
    {
        $data = $form->validate($request);
        State::create($data);

        Splade::toast('State created successfully')->autoDismiss(3);

        return to_route('admin.states.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        return view('admin.states.edit',[
            'form' => UpdateStateForm::make()->action(route('admin.states.update',$state))
            ->fill($state)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state, UpdateStateForm $form)
    {
        $data = $form->validate($request);
        $state->update($data);

        Splade::toast('State updated successfully')->autoDismiss(3);

        return to_route('admin.states.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();
        Splade::toast('State deleted successfully')->autoDismiss(3);

        return back();
    }
}
