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
                            <th scope="col">Email</th>
                            <th scope="col">address</th>
                            <th scope="col">items</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($orders as $key => $order)
                                <tr>
                                    <form method="post" action="{{ url('/removeFromCart') }}">
                                        @csrf
                                        <th scope="row">{{ $key + 1 }}
                                        <input type="hidden" name="id" value="{{ $key }}">
                                        </th>
                                        <td>{{ $order['name'] }}
                                        </td>
                                        <td>{{ $order['email'] }}
                                        </td>
                                        <td>
                                            {{ $order['description'] }}
                                        </td>
                                        <td>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>product name</th>
                                                        <th>product price</th>
                                                        <th>quantity</th>
                                                        <th>total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order->Items as $key => $item)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $item->product->name }}</td>
                                                            <td>{{ $item->product->price }}</td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td>{{ $item->quantity* $item->product->price }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            {{ $order->totalPrice() }}
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
