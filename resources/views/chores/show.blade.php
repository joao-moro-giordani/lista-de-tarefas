@extends('chores._base')

@section('title', 'Ver Tarefa')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <a href="{{ route('chores.index') }}" style="color: white; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">← Voltar para Tarefas</a>
    </div>

    <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.1); display: grid; grid-template-columns: 1fr 1fr; gap: 0;">
        @if ($chore->image)
            <div style="width: 100%; height: 400px; background: #f5f5f5; overflow: hidden;">
                <img src="{{ asset('storage/' . $chore->image) }}" alt="{{ $chore->title }}" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        @else
            <div style="width: 100%; height: 400px; background: linear-gradient(135deg, #e3e9f3 0%, #d9e2f0 100%); display: flex; align-items: center; justify-content: center; font-size: 5rem;">📝</div>
        @endif

        <div style="padding: 2.5rem; display: flex; flex-direction: column;">
            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2rem;">
                <h1 style="font-size: 2rem; color: #2c3e50; flex: 1;">{{ $chore->title }}</h1>
                @if ($chore->is_done)
                    <span style="background-color: #d4edda; color: #155724; padding: 0.6rem 1.2rem; border-radius: 6px; font-size: 0.9rem; font-weight: 600; white-space: nowrap;">✓ Concluída</span>
                @else
                    <span style="background-color: #fff3cd; color: #856404; padding: 0.6rem 1.2rem; border-radius: 6px; font-size: 0.9rem; font-weight: 600; white-space: nowrap;">⏳ Pendente</span>
                @endif
            </div>

            @if ($chore->description)
                <div style="margin-bottom: 2rem;">
                    <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 0.8rem; color: #2c3e50;">Descrição</h3>
                    <p style="color: #7f8c8d; line-height: 1.8; font-size: 0.95rem;">{{ $chore->description }}</p>
                </div>
            @endif

            <div style="background-color: #f5f7fa; padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.8rem 0; border-bottom: 1px solid #ecf0f1;">
                    <span style="font-weight: 600; color: #2c3e50;">Criada em:</span>
                    <span style="color: #7f8c8d; font-size: 0.9rem;">{{ $chore->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.8rem 0;">
                    <span style="font-weight: 600; color: #2c3e50;">Última atualização:</span>
                    <span style="color: #7f8c8d; font-size: 0.9rem;">{{ $chore->updated_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="{{ route('chores.update', $chore->id) }}" style="flex: 1; padding: 0.8rem; background: #f39c12; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; text-align: center; transition: all 0.3s ease; min-width: 120px;">✏️ Editar</a>
                <a href="{{ route('chores.delete', $chore->id) }}" style="flex: 1; padding: 0.8rem; background: #e74c3c; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; text-align: center; transition: all 0.3s ease; min-width: 120px;">🗑️ Deletar</a>
                <a href="{{ route('chores.index') }}" style="flex: 1; padding: 0.8rem; background: #95a5a6; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; text-align: center; transition: all 0.3s ease; min-width: 120px;">Voltar</a>
            </div>
        </div>
    </div>

    @media (max-width: 768px) {
        <style>
            div[style*="grid-template-columns: 1fr 1fr"] {
                grid-template-columns: 1fr !important;
            }
        </style>
    }
@endsection
