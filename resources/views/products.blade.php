@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ url('/products') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Price</label>
                        <input type="number" class="form-control" name="price" id="exampleInputPassword1" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputPassword1"
                            placeholder="Product description">
                    </div>

                    <button type="submit" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="conteiner">
        <div class="row">
            <div class="col-md-8 offset-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qunatity</th>
                            <th scope="col">Add to cart</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <form action="{{ url('/addToCart') }}" method="POST">
                                    @csrf
                                    <th scope="row">{{ $key }}
                                        <input type="hidden" name="product_id" id="" value="{{ $product->id }}">
                                    </th>
                                    <td>{{ $product->name }}
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                    </td>
                                    <td>{{ $product->description }}
                                        <input type="hidden" name="description" value="{{ $product->description }}">
                                    </td>
                                    <td>{{ $product->price }}
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                    </td>
                                    <td>
                                        <input type="number" name="quantity" value="1" min="1" max="10" class="form-control">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
