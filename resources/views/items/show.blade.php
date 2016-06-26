@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="Item">
            <div class="col-md-4">
                <div class="Item__featuredImage">
                    <img src="/images/item.png" 
                        class="img-responsive" 
                        alt="{{ $item->name }}" 
                        title="{{ $item->name }}" />     
                </div>  
                <div class="Item__thumbnails row">
                    @foreach( range(1, 4) as $index )
                        <div class="col-md-3">
                            <img src="/images/item.png" 
                                class="img-responsive" 
                                alt="{{ $item->name }}" 
                                title="{{ $item->name }}" />   
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="Item__name">{{ $item->name }}</h2>
                <hr />
                <h4 class="Item__price">
                    AED {{ $item->price }}
                </h4>
                <p class="Item__description">
                    {{ $item->description }}
                </p>
                <hr />
            	<form method="POST" class="form-inline" action="{{ route('cart.store') }}">
            		{!! csrf_field() !!}
            		<input type="hidden" name="product_id" value="{{ $item->id }}" />
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <a href="#" class="btn btn-default">-</a>
                            </div>
                            <input type="text" name="quantity" value="1" size="3" class="form-control" />
                            <div class="input-group-btn">
                                <a href="#" class="btn btn-default">+</a>
                            </div>
                        </div>
                    </div>
            		<div class="form-group">
            			<button type="submit" class="btn btn-primary">Add to Cart</button>
            		</div>
            	</form>
            </div>
        </div>
        <div class="Related">
            <div class="col-md-12">
                <h4 class="subtitle-center">More from this collection</h4>
                <div class="Cards row">
                @foreach( $relatedItems as $item )
                    <div class="col-md-15">
                        <a href="{{ route('items.show', $item->slug) }}" class="Card__link">
                            <div class="Card">
                                <div class="Card__image">
                                    <img src="/images/item.png" 
                                        class="img-responsive" 
                                        alt="{{ $item->name }}" 
                                        title="{{ $item->name }}" />
                                </div>
                                <div class="Card__content">
                                    <h4 class="Card__title">{{ str_limit($item->name, 30) }}</h4>
                                </div>
                                <div class="Card__footer">
                                    <h5 class="Card__footer--left">
                                        AED {{ $item->price }}
                                    </h5>
                                    <h5 class="Card__footer--right">
                                        AED {{ $item->price - 5 }}
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
