@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $product->name }}</div>
                <div class="panel-body">
                	<form method="POST" action="{{ route('cart.store') }}">
                		{!! csrf_field() !!}
                		<input type="hidden" name="product_id" value="{{ $product->id }}" />
                		<div class="form-group">
                			<button type="submit" class="btn btn-primary">Add to Cart</button>
                		</div>
                	</form>
                </div>	
            </div>
        </div>
    </div>
</div>
@endsection
