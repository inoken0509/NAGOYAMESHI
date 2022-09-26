@extends('layouts.dashboard')

@section('content')
    <div class="col container">
        <div class="row justify-content-center">
            <div class="col-xxl-9 col-xl-10 col-lg-11">
                <h1 class="mb-4 text-center">会員一覧</h1>     
                
                <div class="d-flex justify-content-center">
                    <form method="GET" action="{{ route('dashboard.users.index') }}" class="admin-search-box mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="侍太郎" name="keyword" value="{{ $keyword }}">
                            <button type="submit" class="btn btn-primary text-white shadow-sm">検索</button> 
                        </div>               
                    </form>                     
                </div>

                <table class="table users-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">氏名</th>
                            <th scope="col">メールアドレス</th>
                            <th scope="col">電話番号</th>                                                                                  
                        </tr>
                    </thead>   
                    <tbody>                 
                        @foreach($users as $user)  
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{ route('dashboard.users.show', $user) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>                                                                
                            </tr>  
                        @endforeach
                    </tbody>
                </table> 

                <div class="d-flex justify-content-center">
                    {{ $users->appends(request()->query())->links() }}
                </div>                
            </div>                
        </div>
    </div>
@endsection