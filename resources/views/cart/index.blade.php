@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>Shopping Cart</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Subtotal</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $items as $item )
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->rowID) }}">
                                {!! csrf_field() !!}
                                {!! method_field('PUT') !!}
                                <div class="form-control">
                                    <input type="text" name="quantity" value="{{ $item->qty }}" class="form-control" />
                                </div>
                                <div class="form-control">
                                    <button type="submit" class="btn btn-default">Update</button>
                                </div>  
                            </form>         
                        <td>{{ $item->subtotal }}</td>
                        <td>
                            <form action="{{ route('cart.destroy', $item->rowId) }}">
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


