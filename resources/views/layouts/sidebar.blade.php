<div class="container mt-4 ms-3">
    <h2>会員管理</h2>
    <div class="d-flex flex-column mb-2">
        <label class="samuraimart-sidebar-category-label"><a href="{{ route('dashboard.users.index') }}">会員一覧</a></label>
    </div>

    <h2>店舗管理</h2>
    <div class="d-flex flex-column mb-2">
        <label class="samuraimart-sidebar-category-label"><a href="{{ route('dashboard.restaurants.index') }}">店舗一覧</a></label>  
        <label class="samuraimart-sidebar-category-label"><a href="{{ route('dashboard.restaurants.create') }}">店舗登録</a></label>                    
    </div>

    <h2>カテゴリ管理</h2>
    <div class="d-flex flex-column mb-2">
        <label class="samuraimart-sidebar-category-label">カテゴリ一覧</label>        
    </div>    

    <h2>その他</h2>
    <div class="d-flex flex-column mb-2">
        <label class="samuraimart-sidebar-category-label">会社情報管理</label>        
    </div>
</div>