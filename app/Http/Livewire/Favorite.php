<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class Favorite extends Component
{
    public $shops;

    public function mount(){
        $this->shops = Shop::all();
    }

    public function favorite(Shop $shop)
    {
        // dd($shop->all());
        $shop->users()->attach(Auth::id());

        return redirect('/');
    }



    public function delete(Shop $shop)
    {
        // dd($shop->all());
        $shop->users()->detach(Auth::id());

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.favorite')->extends("layouts.default");
    }
}
