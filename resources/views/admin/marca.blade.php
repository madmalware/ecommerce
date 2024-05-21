@extends('layouts.base')

@section('content')

<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Marcas</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('categoria')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Marcas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section-b-space">
    <div class="container">
        <div class="row">
            <form action="{{ route('marcas.store') }}" method="POST" class="row g-3 section-b-space">
                @csrf
                <div class="col-5">
                    <input type="text" class="form-control" name="nome" placeholder="Nome da Marca">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-solid-default rounded btn">Adicionar</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">id</th>
                            <th scope="col">nome</th>
                            <th scope="col">editar</th>
                            <th scope="col">excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($marcas as $marca)
                    <tr>
                        <td>{{ $marca->id }}</td>
                        <td>
                            <form action="{{ route('marcas.update', $marca->id) }}" method="POST" class="d-inline-flex">
                                @csrf
                                @method('PUT')
                                <input type="text" class="form-control" name="nome" value="{{ $marca->nome }}" style="width: auto;">
                                <button type="submit" class="btn btn-solid-default rounded btn">Salvar</button>
                            </form>
                        </td>
                        <td>
                            <button onclick="showEditForm({{ $marca->id }})" class="btn btn-solid-default rounded btn">Editar</button>
                        </td>
                        <td>
                            <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-solid-default rounded btn">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
    function showEditForm(id) {
        var form = document.querySelector(`form[action*="${id}"][method="POST"]`);
        form.style.display = 'flex';
    }
</script>