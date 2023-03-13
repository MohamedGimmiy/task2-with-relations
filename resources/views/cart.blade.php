@extends('layouts.app')

@section('content')

    <div class="conteiner">
        <div class="row">
            <div class="col-md-8 offset-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Qunatity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Remove From cart</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (session()->has('cart'))

                            @foreach (session()->get('cart') as $key => $item)
                                <tr>
                                    <form method="post" action="{{ url('/removeFromCart') }}">
                                        @csrf
                                        <th scope="row">{{ $key }}
                                        <input type="hidden" name="id" value="{{ $key }}">
                                        </th>
                                        <td>{{ $item['name'] }}
                                        </td>
                                        <td>{{ $item['description'] }}
                                        </td>
                                        <td>
                                            {{ $item['quantity'] }}
                                        </td>
                                        <td>{{ $item['price'] }}
                                        </td>
                                        <td>
                                            {{ $item['quantity']*$item['price'] }}
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if (session()->has('cart'))

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">

                                <form action="{{ url('/addOrder') }}" method="POST">
                                    @csrf
                                    <input type="text" name="name" id="" class="form-control mt-3" placeholder="name">
                                    <input type="email" name="email" class="form-control mt-3" placeholder="email">
                                    <input type="text" name="address" id="" class="form-control mt-3" placeholder="address">
                                    <button type="submit" class="btn btn-success mt-3">Submit Order</button>
                                </form>
                                </div>
                            </div>
                        </div>
                        @endif
            </div>
        </div>
    </div>
@endsection
