<?php

namespace App\Http\Livewire\Page;

use App\Models\Keranjang;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];
    // public $cartItems = [];
    public $quantity = 1;
    public $Keranjang = false;

    public function render()
    {
        // dd($this->cartItems);
        $cart = Keranjang::where('user_id')->get();
        return view('livewire.page.shopping-cart',[
            'cart'=> $cart,
        ])->layout('layouts.guest');
    }
    public function show()
    {
        // dd($this->Keranjang);
        $this->Keranjang = false;
    }
    public function removeCart($id)
    {
        Keranjang::find($id)->delete();
        session()->flash('success', 'Item has removed !');
    }

    public function clearAllCart()
    {
        Keranjang::where('user_id', Auth::user()->id)->delete();
        session()->flash('success', 'All Item Cart Clear Successfully !');
    }
    public function PlusupdateCart($id)
    {
        $cart = Keranjang::find($id);
        $cat = Keranjang::where('id', $id)->update([
            'quantity' => $cart->quantity + 1,
        ]);
        if ($cat) {
            Keranjang::where('id', $id)->update([
                'sub_total' => $cart->quantity * $cart->barang->harga,
            ]);
        }

        // $this->emit('cartUpdated');
    }
    public function MinusupdateCart($id)
    {
        $cart = Keranjang::find($id);
        $cat = Keranjang::where('id', $id)->update([
            'quantity' => $cart->quantity - 1,
        ]);
        if ($cat) {
            Keranjang::where('id', $id)->update([
                'sub_total' => $cart->quantity * $cart->barang->harga,
            ]);
        }

        // $this->emit('cartUpdated');
    }
    public function CheckOut()
    {
        return redirect()->route('Customer.Pembayaran');
    }
}
