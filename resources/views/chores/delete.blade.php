@extends('chores._base')

@section('title', 'Deletar Tarefa')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <a href="{{ route('chores.index') }}" style="color: white; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">← Voltar para Tarefas</a>
    </div>

    <div style="background: white; border-radius: 12px; padding: 3rem 2rem; max-width: 500px; margin: 0 auto; box-shadow: 0 8px 25px rgba(0,0,0,0.1); text-align: center;">
        <div style="font-size: 3.5rem; margin-bottom: 1.5rem;">🗑️</div>
        <h2 style="font-size: 1.5rem; color: #2c3e50; margin-bottom: 1rem;">Deletar Tarefa</h2>
        <p style="font-size: 1rem; color: #2c3e50; margin-bottom: 0.8rem;">Tem certeza que deseja deletar a tarefa "<strong>{{ $chore->title }}</strong>"?</p>
        <p style="color: #e74c3c; font-size: 0.9rem; margin-bottom: 2rem; font-weight: 600;">⚠️ Esta ação não pode ser desfeita.</p>

        <form action="{{ route('chores.destroy', $chore->id) }}" method="POST" style="display: flex; flex-direction: column;">
            @csrf
            @method('DELETE')
            
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <button type="submit" style="flex: 1; padding: 0.8rem; background: #e74c3c; color: white; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; min-width: 120px; font-size: 0.95rem;">🗑️ Confirmar Deleção</button>
                <a href="{{ route('chores.index') }}" style="flex: 1; padding: 0.8rem; background: #95a5a6; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; text-align: center; transition: all 0.3s ease; min-width: 120px; font-size: 0.95rem;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
