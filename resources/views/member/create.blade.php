@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">新規従業員</div>

        <!-- <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif -->

          <!-- @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif -->

          create
          <form  action="{{route('member.store')}}" method="post">
            @csrf
            氏名
            <input type="text" name="member_name" >
            <br>
            性別
            <input type="radio" name="gender"value=0 >男性
            <input type="radio" name="gender"value=1 >女性
            <br>
            種別
            <select  name="type">
              <option value="">選択してください</option>
              <option value=1>社員</option>
              <option value=2>大学生バイト</option>
              <option value=3>高校生バイト</option>

            </select>
            <br>
            <input class="btn btn-info" type="submit" value="登録する">
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
