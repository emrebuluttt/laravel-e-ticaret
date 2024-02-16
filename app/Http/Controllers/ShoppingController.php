<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use ShoppingCart;
class ShoppingController extends Controller
{
    public function index(){
        $books = ShoppingCart::all();

        $template = env('TEMPLATE');
        return view($template . '.cart', compact('books'));
    }

    public function addtocard($id){
        $book = Book::NotDeleteds()->findOrFail($id);
        ShoppingCart::add($book->id, $book->name, 1, $book->price, []);

        return redirect()->back();
    }

    public function removefromcard($raw_id){
        ShoppingCart::remove($raw_id);

        return redirect()->back();
    }

    public function updatecart($raw_id, $type){
        $item = ShoppingCart::get($raw_id);

        if($type == 'increase')
            ShoppingCart::update($raw_id, $item->qty + 1);
        else
            ShoppingCart::update($raw_id, $item->qty - 1);



        return redirect()->back();
        }
}
