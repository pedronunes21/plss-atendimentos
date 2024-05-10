<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\CallCategory;
use App\Models\Situation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function index() {
        $calls = Call::with(['category', 'situation'])->get();

        return view("calls.index", [
            'calls' => $calls
        ]);
    }

    public function createView(call $call) {
        $categories = CallCategory::all();

        return view("calls.create", [
            'categories' => $categories
        ]);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'title'=> 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        $situation = Situation::where('name', 'Novo')->first();

        if ($situation === null) {
            // Create situation called 'New'
            $situation = Situation::create([
                'name' => 'Novo'
            ]);
        }

        
        $call = call::create([
            'title' => $data['title'],
            'description'=> $data['description'],
            'category_id'=> $data['category'],
            'situation_id' => $situation->id
        ]);

        return redirect(route('calls.index.view'));

    }

    public function updateView(call $call) {
        $categories = CallCategory::all();
        $situations = Situation::all();
        return view("calls.update", [
            'call' => $call,
            'categories'=> $categories,
            'situations'=> $situations,
        ]); 
    }

    public function update(call $call, Request $request) {
        $data = $request->validate([
            'title'=> 'required',
            'description' => 'required',
            'category' => 'required',
            'situation' => 'required'
        ]);

        $situation = Situation::where('id', $data['situation'])->first();

        if ($situation->name === 'Resolvido') {
            $call->update([
                'title' => $data['title'],
                'description'=> $data['description'],
                'category_id'=> $data['category'],
                'situation_id'=> $data['situation'],
                'solution_date' => Carbon::now()
            ]);
        } else {
            $call->update([
                'title' => $data['title'],
                'description'=> $data['description'],
                'category_id'=> $data['category'],
                'situation_id'=> $data['situation'],
            ]);
        }

        return redirect(route('calls.index.view'))->with('success', 'Atendimento atualizado!');
    }

    public function delete(call $call) {
        $call->delete();

        return redirect(route('calls.index.view'))->with('success', 'Atendimento excluído!');
    }
}
