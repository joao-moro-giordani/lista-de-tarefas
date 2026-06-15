<?php

namespace App\Http\Controllers;
use App\Models\Chore;
use App\Http\Requests\ChoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChoreController extends Controller
{
     public function index() {
        $chores = Chore::all();
        return view('chores.index', [
            'chores' => $chores
        ]);
    }

    public function show($id)
    {
        $chore = Chore::findOrFail($id);
        return view('chores.show', [
            'chore' => $chore
        ]);
    }

    public function store(ChoreRequest $request) {
        if ($request->isMethod('post')) {
            $dados = $request->validated();

            if ($request->hasFile('image')) {
                $dados['image'] = $request->file('image')->store('images', 'public');
            }

            Chore::create($dados);
            return redirect()->route('chores.index')->with('mensagem', 'Tarefa criada com sucesso!');
        }

        return view('chores.create');
    }   

    public function update(ChoreRequest $request, $id)
    {
        $chore = Chore::findOrFail($id);
        if ($request->isMethod('put')) {
            $dados = $request->validated();
            if ($request->hasFile('image')) {
                if ($chore->image) {
                    Storage::disk('public')->delete($chore->image);
                }
                $dados['image'] = $request->file('image')->store('images', 'public');
            }
            $chore->update($dados);
            return redirect()->route('chores.index')->with('mensagem', 'Tarefa editada com sucesso!');
        }

        return view('chores.edit', [
            'chore' => $chore,
        ]);
    }

    public function delete($id) 
    {
        $chore = Chore::findOrFail($id);
        if (request()->isMethod('delete')) {
            $chore->delete();
            return redirect()->route('chores.index')->with('mensagem', 'Tarefa excluída com sucesso!');
        }

        return view('chores.delete', [
            'chore' => $chore,
        ]);
    }
}
