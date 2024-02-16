@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">{{ __('Sepet') }}</div>
                            <div class="col-6 d-flex justify-content-end">
                                Sepette {{ShoppingCart::countRows()}} adet kitap var
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kitabın İsmi</th>
                                <th scope="col">Adet</th>
                                <th scope="col">Fiyatı</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$book->name}}</td>

                                    <td>
                                        <a href="{{route('shopping.updatecart', [$book->__raw_id, 'decrease'])}}" class="btn btn-danger">-</a>
                                        {{$book->qty}}
                                        <a href="{{route('shopping.updatecart', [$book->__raw_id, 'increase'])}}" class="btn btn-success">+</a>
                                    </td>
                                    <td>{{$book->price}}₺</td>
                                    <td>
                                        <a href="{{route('shopping.removefromcard', $book->__raw_id)}}" class="btn btn-danger">Sepetten Çıkar</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-right">Toplam Tutar</td>
                                <td>{{ShoppingCart::totalPrice()}}₺</td>

                            </tr>
                            </tbody>
                        </table>
                        <form action="{{route('orders.store')}}" method="POST">
                            @csrf
                            <h2>Sipariş Bilgileri</h2>
                            <div class="form-group">
                                <label for="address">Ad</label>
                                <input type="text" class="form-control" name="name" required placeholder="Ad">
                            </div>
                            <div class="form-group">
                                <label for="address">Soyad</label>
                                <input type="text" class="form-control" name="surname" required placeholder="Soyad">
                            </div>
                            <div class="form-group">
                                <label for="address">Adres</label>
                                <input type="text" class="form-control" name="address" required placeholder="Adres">
                            </div>
                            <div class="form-group">
                                <label for="address">Mesaj</label>
                                <input type="text" class="form-control" name="message" required placeholder="Mesaj">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Sipariş Ver</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

