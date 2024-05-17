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
                <h3>Cadastro Categoria</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('categoria')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Categoria</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section-b-space">
    <div class="container">
        <div class="row">
            <form class="row g-3 section-b-space">
                <div class="col-5">
                    <input type="text" class="form-control" id="" placeholder="Nome da Categoria">
                </div>
                <div class="col-5">
                     <button class="btn btn-solid-default rounded btn">Adicionar</button>
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
                        <tr>
                            <td>
                                <a>id</a>
                            </td>
                            <td>
                                <a>nome</a>
                            </td>
                            <td>
                                <a>editar</a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@endsection