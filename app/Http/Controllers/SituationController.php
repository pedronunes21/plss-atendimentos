<?php

namespace App\Http\Controllers;

use App\Models\Situation;
use Illuminate\Http\Request;

class SituationController extends Controller
{

    public function index() {
        $situations = Situation::all();

        return view("calls.situation.index", [
            'situations' => $situations
        ]);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name'=> 'required',
        ]);
        $situation = Situation::create($data);

        return redirect(route('calls.situation.index.view'));

    }

    public function updateView(Situation $situation) {
        return view("calls.situation.update", [
            'situation' => $situation
        ]);
    }

    public function update(Situation $situation, Request $request) {
        $data = $request->validate([
            'name'=> 'required',
        ]);

        $situation->update($data);

        return redirect(route('calls.situation.index.view'))->with('success', 'Situação atualizada!');
    }

    public function delete(Situation $situation) {
        $situation->delete();

        return redirect(route('calls.situation.index.view'))->with('success', 'Situação excluída!');
    }
}
