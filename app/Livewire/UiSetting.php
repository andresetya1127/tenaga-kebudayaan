<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UiSetting extends Component
{
    public $user;

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
    }

    public function render()
    {
        return view('livewire.ui-setting');
    }

    public function themeSidebar($theme)
    {

        $this->user->sidebar = $theme;
        $this->user->save();

        $this->dispatch('sweat-alert', title: 'Tema Sidebar Berhasil Diterapkan.', icon: 'success');
    }

    public function themeHeader($theme)
    {
        $user = User::find(auth()->user()->id);
        $user->header = $theme;
        $user->save();

        $this->dispatch('sweat-alert', title: 'Tema Header Berhasil Diterapkan.', icon: 'success');
    }
}
