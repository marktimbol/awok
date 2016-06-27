@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>Shopping Cart</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Subtotal</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $items as $item )
                    <tr>
                        <td>
                            <a href="{{ route('items.show', $item->options->item->slug) }}">
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>AED {{ $item->price }}</td>
                        <td width="120">
                            <form action="{{ route('cart.update', $item->rowID) }}">
                                {!! csrf_field() !!}
                                {!! method_field('PUT') !!}
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <a href="#" class="btn btn-default">-</a>
                                        </div>
                                        <input type="text" name="quantity" value="{{ $item->qty }}" size="3" class="form-control" />
                                        <div class="input-group-btn">
                                            <a href="#" class="btn btn-default">+</a>
                                        </div>
                                    </div>
                                </div>
                            </form>         
                        <td>AED {{ $item->subtotal }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.destroy', $item->rowId) }}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </div>      
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5">
                            Total: AED {{ $total }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <a href="/checkout" class="btn btn-primary btn-lg">Checkout</a>
        </div>
    </div>
</div>
@endsection


