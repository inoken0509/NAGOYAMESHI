@extends('layouts.app')

@section('content')     
    <div class="container">
        <h1 class="mb-3">{{ $restaurant->name }}</h1>               

        <div class="mb-3">
            <a href="{{ route('restaurants.index') }}">< 戻る</a>     
        </div>
        
        <div class="container p-0">
            <div class="row g-3">
                <div class="col-12 col-lg-4">
                    <img src="{{ asset('storage/restaurants/' . $restaurant->image) }}" class="w-100">
                </div>
                <div class="col">
                    <div class="border-bottom mb-2">
                        <p class="mb-2"><span class="fw-bold">カテゴリ：</span>{{ $restaurant->category->name }}</p>
                    </div>
                    <div class="border-bottom mb-2">
                        <p class="mb-2"><span class="fw-bold">予算：</span>{{ $restaurant->lowest_price }}円～{{ $restaurant->highest_price }}円</p>
                    </div>      
                    <div class="border-bottom mb-2">
                        <p class="mb-2"><span class="fw-bold">営業時間：</span>{{ date('G:i', strtotime($restaurant->opening_time)) . '～' . date('G:i', strtotime($restaurant->closing_time)) }}　<span class="fw-bold">定休日：</span>{{ $restaurant->regular_holiday }}</p>
                    </div>                                   
                    <div class="border-bottom mb-2">
                        <p class="mb-2">{{ $restaurant->description }}</p>
                    </div>
                    <div class="border-bottom mb-2">
                        <p class="mb-2"><span class="fw-bold">住所：</span>〒{{ $restaurant->postal_code }}　{{ $restaurant->address }}</p>
                    </div>                    
                </div>
            </div>
        </div>                
    </div>                                                                                                                                                            
@endsection