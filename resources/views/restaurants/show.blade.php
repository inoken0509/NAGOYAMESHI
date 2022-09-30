@extends('layouts.app')

@section('content')     
    <div class="container">
        <h1 class="mb-3">{{ $restaurant->name }}</h1>       
        
        @if (session('flash_message')) 
            <div>
                <p class="text-success">{{ session('flash_message') }}</p>                    
            </div>                                   
        @endif        

        <div class="mb-3">
            <a href="{{ route('restaurants.index') }}">< 戻る</a>     
        </div>
        
        <div class="container p-0 mb-4">
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

        <div>
            <h2 class="mb-3">予約</h2>    
                       
        </div>        
        
        <div>
            <h2 class="mb-3">レビュー一覧</h2>    

            <div class="mb-3">
                <a href="{{ route('restaurants.reviews.create', $restaurant) }}" class="btn btn-primary shadow-sm">レビュー投稿</a>                
            </div>

            @foreach ($reviews as $review)
                <div class="border-bottom mb-3">
                    <h3>{{ $review->user->name }}</h3>
                    <p class="text-warning">{{ str_repeat('★', $review->score) }}</p>
                    <p>{{ $review->comment }}</p>
                    @if ($review->user->id == Auth::id())
                        <div class="d-flex mb-3">
                            <a href="{{ route('restaurants.reviews.edit', [$restaurant, $review]) }}" class="btn btn-primary shadow-sm me-2">編集</a>      
                            <form action="{{ route('restaurants.reviews.destroy', [$restaurant, $review]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('削除してもよいですか？');">削除</button>
                            </form>                                                
                        </div>
                    @endif                    
                </div>
            @endforeach 
            <div>
                {{ $reviews->links() }}
            </div>                       
        </div>
    </div>                                                                                                                                                            
@endsection