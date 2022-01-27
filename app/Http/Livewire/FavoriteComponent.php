<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\User;
use App\Models\Favorite;


class FavoriteComponent extends Component
{

    public $favorite = false;
    public $data;
    public $user;
    public $shop;

    public function mount()
    {
        $this->user = Auth::User();
        $this->data = Favorite::where('user_id', $this->user->id)
            ->where('shop_id', $this->shop->id)->first();
        if ($this->data) {
            $this->favorite = true;
        }
    }

    public function render()
    {
        return view('livewire.favorite-component')->extends("layouts.default");
    }

    public function favorite()
    {
        $this->favorite = !$this->favorite;
        if (!$this->data) {
            $createFavorite = Favorite::create(
                [
                    'user_id' => $this->user->id,
                    'shop_id' => $this->shop->id,
                ]
            );
        } else {
            $updateFavorite = Favorite::where('user_id', $this->user->id)
                ->where('shop_id', $this->shop->id)
                ->update();
        }
    }

    public function favorite_delete()
    {
        $this->favorite = !$this->favorite;
        $favorite_delete = Favorite::where('user_id', $this->user->id)
            ->where('shop_id', $this->shop->id)
            ->delete();
    }
}
