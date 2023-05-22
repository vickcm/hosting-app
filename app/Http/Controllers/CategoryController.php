<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function formNew()
    {
        return view('categories.formNew');
    }

    public function processNew(request $request) 
    {
        $data = $request->except(['_token']);
        $request->validate(Category::validationRules(), Category::validationMessages());
        
        Category::create($data);
        return redirect()
            ->route('dashboardCategories')
            ->with('message', 'Categoría creada correctamente')
            ->with('type', 'warning');
    }

    public function formEdit(int $id)
    {
        $category = Category::findOrFail($id);

        return view('categories.formEdit', [
            'category' => $category,
        ]);
    }

    public function processEdit(Request $request, int $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->except(['_token']);
        $request->validate(Category::validationRules(), Category::validationMessages());
        $category->update($data);

        return redirect()
            ->route('dashboardCategories')
            ->with('message', 'Categoría editada correctamente')
            ->with('type', 'warning');
    }

    public function confirmDelete(int $id)
    {
        $category = Category::findOrFail($id);

        return view('categories.confirmDelete', [
            'category' => $category,
        ]);
    }

    public function processDelete(int $id)
    {
        $category = Category::findOrFail($id);

        //chequear que no tenga posts asociados
        
        if ($category->posts()->count() > 0) {
            return redirect()
                ->route('dashboardCategories')
                ->with('message', 'No se puede eliminar una categoría con entradas asociadas')
                ->with('type', 'danger');
        }

        $category->delete();

        return redirect()
            ->route('dashboardCategories')
            ->with('message', 'Categoría eliminada correctamente')
            ->with('type', 'warning');
    }
}