@extends('layouts.app')

@section('content')
    @foreach( $items->chunk(5) as $items )
    	<div class="Cards row">
    		@foreach( $items as $item)
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
    @endforeach
@endsection