@extends('chores._base')

@section('title', 'Nova Tarefa')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <a href="{{ route('chores.index') }}" style="color: white; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">← Voltar para Tarefas</a>
    </div>

    <div style="background: white; border-radius: 12px; padding: 2.5rem; max-width: 600px; margin: 0 auto; box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
        <h2 style="margin-bottom: 2rem; color: #2c3e50; font-size: 1.8rem;">Criar Nova Tarefa</h2>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 1.2rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #dc3545;">
                <h4 style="margin-bottom: 0.5rem;">Erros ao processar:</h4>
                <ul style="margin-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li style="margin-bottom: 0.3rem;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('chores.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 1.5rem;">
            @csrf

            <div>
                <label style="display: block; font-weight: 600; color: #2c3e50; margin-bottom: 0.5rem; font-size: 0.95rem;">Título da Tarefa *</label>
                <input 
                    type="text" 
                    name="title" 
                    placeholder="Digite o título da tarefa"
                    value="{{ old('title') }}"
                    required
                    style="width: 100%; padding: 0.8rem; border: 2px solid #ecf0f1; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease; @error('title') border-color: #e74c3c; @enderror"
                    onfocus="this.style.borderColor='#667eea'; this.style.boxShadow='0 0 0 3px rgba(102, 126, 234, 0.1)';"
                    onblur="this.style.borderColor='#ecf0f1'; this.style.boxShadow='none';"
                >
                @error('title')
                    <span style="color: #e74c3c; font-size: 0.8rem; display: block; margin-top: 0.3rem;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label style="display: block; font-weight: 600; color: #2c3e50; margin-bottom: 0.5rem; font-size: 0.95rem;">Descrição</label>
                <textarea 
                    name="description" 
                    placeholder="Digite a descrição da tarefa"
                    rows="5"
                    style="width: 100%; padding: 0.8rem; border: 2px solid #ecf0f1; border-radius: 8px; font-size: 1rem; font-family: inherit; resize: vertical; transition: all 0.3s ease; @error('description') border-color: #e74c3c; @enderror"
                    onfocus="this.style.borderColor='#667eea'; this.style.boxShadow='0 0 0 3px rgba(102, 126, 234, 0.1)';"
                    onblur="this.style.borderColor='#ecf0f1'; this.style.boxShadow='none';"
                >{{ old('description') }}</textarea>
                @error('description')
                    <span style="color: #e74c3c; font-size: 0.8rem; display: block; margin-top: 0.3rem;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label style="display: block; font-weight: 600; color: #2c3e50; margin-bottom: 0.5rem; font-size: 0.95rem;">Imagem</label>
                <input 
                    type="file" 
                    name="image" 
                    accept="image/*"
                    style="width: 100%; padding: 0.8rem; border: 2px solid #ecf0f1; border-radius: 8px; cursor: pointer; @error('image') border-color: #e74c3c; @enderror"
                >
                <small style="color: #7f8c8d; display: block; margin-top: 0.3rem;">Formatos aceitos: JPG, PNG, GIF (máx. 2MB)</small>
                @error('image')
                    <span style="color: #e74c3c; font-size: 0.8rem; display: block; margin-top: 0.3rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; align-items: center; gap: 0.8rem;">
                <input 
                    type="checkbox" 
                    id="is_done" 
                    name="is_done" 
                    value="1"
                    @if(old('is_done')) checked @endif
                    style="width: 20px; height: 20px; cursor: pointer; accent-color: #667eea;"
                >
                <label for="is_done" style="font-weight: 500; color: #2c3e50; cursor: pointer;">Marcar como concluída</label>
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                <button type="submit" style="flex: 1; padding: 0.8rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);">Criar Tarefa</button>
                <a href="{{ route('chores.index') }}" style="flex: 1; padding: 0.8rem; background: #95a5a6; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; text-align: center; transition: all 0.3s ease;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
