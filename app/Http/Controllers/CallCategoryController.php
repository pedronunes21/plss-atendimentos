<?php

namespace App\Http\Controllers;

use App\Models\CallCategory;
use Illuminate\Http\Request;

class CallCategoryController extends Controller
{

    public function index() {
        $categories = CallCategory::all();

        return view("calls.category.index", [
            'categories' => $categories
        ]);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name'=> 'required',
        ]);
        $callCategory = CallCategory::create($data);

        return redirect(route('calls.category.index.view'));

    }

    public function updateView(CallCategory $category) {
        return view("calls.category.update", [
            'category' => $category
        ]);
    }

    public function update(CallCategory $category, Request $request) {
        $data = $request->validate([
            'name'=> 'required',
        ]);

        $category->update($data);

        return redirect(route('calls.category.index.view'))->with('success', 'Categoria atualizada!');
    }

    public function delete(CallCategory $category) {
        $category->delete();

        return redirect(route('calls.category.index.view'))->with('success', 'Categoria excluída!');
    }
}
