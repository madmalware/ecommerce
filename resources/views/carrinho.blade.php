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
                <h3>Carrinho</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Carrinho</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Carrinho Section Inicio -->
<section class="cart-section section-b-space">
    <div class="container">
        @if($carrinhoItems->Count() > 0)
        <div class="row">
            <div class="col-md-12 text-center">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">imagem</th>
                            <th scope="col">nome</th>
                            <th scope="col">preço</th>
                            <th scope="col">quantidade</th>
                            <th scope="col">total</th>
                            <th scope="col">excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrinhoItems as $item)                                                   
                        <tr>
                            <td>
                                <a href="{{route('produto.detalhe',['slug'=>$item->model->slug])}}">
                                    <img src="{{asset('assets/images/fashion/product/front')}}/{{$item->model->image}}" class="blur-up lazyloaded" alt="{{$item->model->nome}}">
                                </a>
                            </td>
                            <td>
                                <a href="{{route('produto.detalhe',['slug'=>$item->model->slug])}}">{{$item->model->nome}}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantidade" class="form-control input-number"
                                                    value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h2>${{number_format($item->model->preco_venda ?? $item->model->preco_regular, 2, ',', '.')}}</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            <a href="javascript:void(0)">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>${{number_format($item->model->preco_venda ?? $item->model->preco_regular, 2, ',', '.')}}</h2>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" name="quantidade" data-rowid="{{$item->rowId}}" onchange="updateQuantidade(this)" class="form-control input-number" value="{{$item->qty}}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2 class="td-color">${{$item->subtotal()}}</h2>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteItem('{{$item->rowId}}')">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>                       
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-md-5 mt-4">
                <div class="row">
                    <div class="col-sm-7 col-5 order-1">
                        <div class="left-side-button text-end d-flex d-block justify-content-end">
                            <a href="javascript:void(0)" onclick="limparCarrinho()" class="text-decoration-underline theme-color d-block text-capitalize">Limpar todos os items</a>
                        </div>
                    </div>
                    <div class="col-sm-5 col-7">
                        <div class="left-side-button float-start">
                            <a href="{{route('comprar')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                <i class="fas fa-arrow-left"></i>Continuar Comprando</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart-checkout-section">
                <div class="row g-4">
                    <div class="col-lg-4 col-sm-6">
                        <div class="promo-section">
                            <form class="row g-3">
                                <div class="col-7">
                                    <input type="text" class="form-control" id="number" placeholder="Coupon Code">
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-solid-default rounded btn">Aplicar Cupom</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 ">
                        <div class="checkout-button">
                            <a href="checkout" class="btn btn-solid-default btn fw-bold">
                                Comprar <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="cart-box">
                            <div class="cart-box-details">
                                <div class="total-details">
                                    <div class="top-details">
                                        <h3>Carrinho Total</h3>
                                        <h6>Subtotal <span>${{Cart::instance('carrinho')->subtotal()}}</span></h6>
                                        <h6>Taxa <span>${{Cart::instance('carrinho')->tax()}}</span></h6>
                                        <h6>Total <span>${{Cart::instance('carrinho')->total()}}</span></h6>
                                    </div>
                                    <div class="bottom-details">
                                        <a href="checkout">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Seu Carrinho Está Vazio!</h2>
                    <h5 class="mt-3">Adicionar Itens.</h5>
                    <a href="{{route('comprar')}}" class="btn btn-warning mt-5">Comprar</a>
                </div>
            </div>
        @endif
    </div>
</section>

<form id="updateQuantCar" action="{{route('carrinho.update')}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" id="rowId" name="rowId" />
    <input type="hidden" id="quantidade" name="quantidade" />
</form>

<form id="delete" action="{{route('carrinho.delete')}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" id="rowId_D" name="rowId" />
</form>

<form id="limpar" action="{{route('carrinho.limpar')}}" method="post">
    @csrf
    @method('delete') 
</form>

@endsection

@push('scripts')
    <script>
        function updateQuantidade(quantidade)
        {
            $('#rowId').val($(quantidade).data('rowid'));
            $('#quantidade').val($(quantidade).val());
            $('#updateQuantCar').submit();
        }      
    </script>
    <script>
        function deleteItem(rowId)
        {
            $('#rowId_D').val(rowId);
            $('#delete').submit();
        }       
    </script>
    <script>
        function limparCarrinho()
        {
            $('#limpar').submit();
        }
    </script>
@endpush