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
                <h3>Cadastro Produtos</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('categoria')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastro Produtos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container-form">
    <h1 class="title-category">Categoria</h1>
        <form class="form">
            <div class="category">

                <label>
                    <input type="checkbox">
                    Automovel
                </label>

                <label>
                    <input type="checkbox">
                    Saúde
                </label>

                <label>
                    <input type="checkbox">
                    Acessório
                </label>

                <label>
                    <input type="checkbox">
                    Eletrodomestico
                </label>

                <label>
                    <input type="checkbox">
                    Casa
                </label>

                <label>
                    <input type="checkbox">
                    Construção
                </label>

                <label>
                    <input type="checkbox">
                    Esporte
                </label>

                <label>
                    <input type="checkbox">
                    Moda
                </label>
            </div>

            <div class="form-fields">
                <label>
                    Nome do produto:
                    <input id="name" type="text" placeholder="Nome do produto">
                </label>
                <div class="quantidade-estoque">
                    <label>
                        Estoque
                        <input name="estoque" id="estoque" type="number">
                    </label>
                    <label>
                        Quantidade
                        <input name="quantidade" id="quantidade" type="number">
                    </label>
                </div>
                <label>
                    Descrição do produto:
                    <textarea rows="10" name="description" id="description"
                        placeholder="Descrição do produto"></textarea>
                </label>

                <div class="precos">

                    <label>
                        Preço Regular
                        <input id="preco-regular" name="preco_regular" type="number">
                    </label>

                    <label>
                        Preço Venda
                        <input id="preco-venda" name="preco_venda" type="number">
                    </label>
                </div>

                <div class="image-upload-wrapper">
                    <label for="image-upload" class="image-upload-label">
                        Adicionar Imagem
                    </label>
                    <input type="file" id="image-upload" class="image-upload-input" accept="image/*" />
                </div>
            </div>

        </form>
</div>

<style>
    
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}

.container-form {
  max-width: 1000px;
  margin: 45px auto;
  background-color: rgb(241 245 249);
  padding: 12px 45px;
  border-radius: 8px;
}

input[type="checkbox"] {
    width: 20px;
    height: 20px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: transparent;
    border: 2px solid orange;
    border-radius: 4px;
    cursor: pointer;
    position: relative;
  }

  input[type="checkbox"]:checked::after {
    content: "";
    position: absolute;
    display: block;
    width: 12px;
    height: 12px;
    border: solid orange;
    border-width: 0 3px 3px 0;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -70%) rotate(45deg); 
  }

.title-category {
  font-size: 1.5rem;
  color: #000;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.category {
  margin-top: 2rem;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 30px;

  label {
    display: flex;
    align-items: center;
    gap: 20px;
    font-size: 18px;
  }
}

.form-fields {
  display: flex;
  flex-direction: column;
  gap: 20px;

  label {
    font-size: 1.2rem;
    font-weight: bold;
  }

  input {
    border: 1.5px solid orange;
    border-radius: 4px;
    margin-top: 10px;
    outline: none;
    padding: 1rem;
    padding: 0.5rem 0.8rem;
  }

  & #name {
    font-size: 1rem;
    width: 100%;
  }

  & #description {
    width: 100%;
    margin-top: 10px;
    resize: none;
    border-radius: 4px;
    font-size: 1.2rem;
    padding: 0.5rem 0.8rem;
    outline: none;
    border: 2px solid orange;
  }

  & #estoque {
    width: 100%;
  }
}

.image-upload-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 200px;
    border: 2px solid #ff8c00;
    border-radius: 5px;
    position: relative;
    cursor: pointer;
    transition: border-color 0.3s;
}

.image-upload-wrapper:hover {
    border-color: #ff8c00;
}

.image-upload-label {
    color: #888;
    font-size: 16px;
    text-align: center;
}

.image-upload-input {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

.precos{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;

    input {
        width: 100%;
    }
}

.quantidade-estoque{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;

    input {
        width: 100%;
    }
}
</style>

<script src="index.js"></script>

@endsection