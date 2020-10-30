@extends('layouts.app')

@section('content')
				
				@include('front.banner')		
				@include('front.products',['blockTitle'=>'Новинки','count'=>8, 'products' => $newProducts])
				@include('front.products',['blockTitle'=>'Хиты продаж','count'=>8, 'products' => $hitProducts])
				@include('front.slider.sale',['blockTitle'=>'Скидки', 'products' => $saleProducts])
				@include('front.slider.blog')
				

@endsection

