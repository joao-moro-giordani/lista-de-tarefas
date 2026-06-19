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
    public function create()
    {
        return view('chores.create');
    }

    public function store(ChoreRequest $request)
    {
        $dados = $request->validated();
        $dados['is_done'] = $request->boolean('is_done');

        if ($request->hasFile('image')) {
            $dados['image'] = $request->file('image')->store('images', 'public');
        }

        Chore::create($dados);
        return redirect()->route('chores.index')->with('mensagem', 'Tarefa criada com sucesso!');
    }

    public function edit($id)
    {
        $chore = Chore::findOrFail($id);
        return view('chores.edit', [
            'chore' => $chore,
        ]);
    }

    public function confirmDelete($id)
    {
        $chore = Chore::findOrFail($id);
        return view('chores.delete', [
            'chore' => $chore,
        ]);
    }

    public function update(ChoreRequest $request, $id)
    {
        $chore = Chore::findOrFail($id);
        $dados = $request->validated();
        $dados['is_done'] = $request->boolean('is_done');

        if ($request->hasFile('image')) {
            if ($chore->image) {
                Storage::disk('public')->delete($chore->image);
            }
            $dados['image'] = $request->file('image')->store('images', 'public');
        }
        $chore->update($dados);
        return redirect()->route('chores.index')->with('mensagem', 'Tarefa editada com sucesso!');
    }

    public function delete($id)
    {   
        $chore = Chore::findOrFail($id);

        if ($chore->image) {
            Storage::disk('public')->delete($chore->image);
        }

        $chore->delete();

        return redirect()->route('chores.index')
            ->with('mensagem', 'Tarefa excluída com sucesso!');
    }
}
