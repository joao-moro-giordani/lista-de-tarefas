@extends('chores._base')

@section('title', 'Minhas Tarefas')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem; gap: 1.5rem; flex-wrap: wrap;">
        <h2 style="font-size: 2.2rem; color: white; font-weight: 700;">Minhas Tarefas</h2>
        <a href="{{ route('chores.create') }}" style="padding: 0.8rem 1.5rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 8px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4); display: inline-block;">+ Criar Nova Tarefa</a>
    </div>

    @if ($chores->isEmpty())
        <div style="text-align: center; padding: 3rem 2rem; background: white; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1);">
            <div style="font-size: 4rem; margin-bottom: 1rem;">📭</div>
            <h3 style="font-size: 1.5rem; color: #2c3e50; margin-bottom: 0.5rem;">Nenhuma tarefa encontrada</h3>
            <p style="color: #7f8c8d; margin-bottom: 1.5rem; font-size: 1rem;">Você ainda não criou nenhuma tarefa. Clique em "Criar Nova Tarefa" para começar.</p>
            <a href="{{ route('chores.create') }}" style="padding: 0.8rem 1.5rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 8px; font-weight: 600; transition: all 0.3s ease; display: inline-block;">Criar Primeira Tarefa</a>
        </div>
    @else
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.5rem;">
            @foreach ($chores as $chore)
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: all 0.3s ease; display: flex; flex-direction: column; @if($chore->is_done) opacity: 0.75; @endif hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0,0,0,0.15); }">
                    @if ($chore->image)
                        <div style="width: 100%; height: 200px; overflow: hidden; background: #f5f5f5;">
                            <img src="{{ asset('storage/' . $chore->image) }}" alt="{{ $chore->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                        </div>
                    @else
                        <div style="width: 100%; height: 200px; background: linear-gradient(135deg, #e3e9f3 0%, #d9e2f0 100%); display: flex; align-items: center; justify-content: center; font-size: 3rem;">📝</div>
                    @endif

                    <div style="padding: 1.5rem; flex: 1; display: flex; flex-direction: column;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 1rem; margin-bottom: 1rem;">
                            <h3 style="font-size: 1.1rem; font-weight: 700; color: #2c3e50; @if($chore->is_done) text-decoration: line-through; color: #bdc3c7; @endif flex: 1;">{{ $chore->title }}</h3>
                            @if ($chore->is_done)
                                <span style="background-color: #d4edda; color: #155724; padding: 0.4rem 0.8rem; border-radius: 6px; font-size: 0.8rem; font-weight: 600; white-space: nowrap;">✓ Concluída</span>
                            @else
                                <span style="background-color: #fff3cd; color: #856404; padding: 0.4rem 0.8rem; border-radius: 6px; font-size: 0.8rem; font-weight: 600; white-space: nowrap;">⏳ Pendente</span>
                            @endif
                        </div>

                        @if ($chore->description)
                            <p style="color: #7f8c8d; font-size: 0.9rem; line-height: 1.5; margin-bottom: 1rem;">{{ Str::limit($chore->description, 120) }}</p>
                        @endif

                        <div style="color: #95a5a6; font-size: 0.8rem; margin-bottom: 1rem;">📅 {{ $chore->created_at->format('d/m/Y') }}</div>
                    </div>

                    <div style="display: flex; gap: 0.5rem; border-top: 1px solid #ecf0f1; padding-top: 1rem; margin: 0 1.5rem 1.5rem;">
                        <a href="{{ route('chores.show', $chore->id) }}" style="flex: 1; padding: 0.6rem; background: #667eea; color: white; text-decoration: none; border-radius: 6px; font-size: 0.8rem; font-weight: 600; text-align: center; transition: all 0.3s ease;">Ver</a>
                        <a href="{{ route('chores.edit', $chore->id) }}" style="flex: 1; padding: 0.6rem; background: #f39c12; color: white; text-decoration: none; border-radius: 6px; font-size: 0.8rem; font-weight: 600; text-align: center; transition: all 0.3s ease;">Editar</a>
                        <a href="{{ route('chores.delete', $chore->id) }}" style="flex: 1; padding: 0.6rem; background: #e74c3c; color: white; text-decoration: none; border-radius: 6px; font-size: 0.8rem; font-weight: 600; text-align: center; transition: all 0.3s ease;">Deletar</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
