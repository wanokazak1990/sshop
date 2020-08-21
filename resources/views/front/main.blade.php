@extends('layouts.app')

@section('content')
				
				@include('front.banner')
				@include('front.section_menu')			
				@include('front.products',['blockTitle'=>'Хиты продаж','count'=>8])
				@include('front.products',['blockTitle'=>'Новинки','count'=>8])
				@include('front.slider.sale')
				@include('front.slider.blog')
				

@endsection