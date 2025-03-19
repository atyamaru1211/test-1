<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $contact;
    public $showModal = false;

    public function mount($contact)
    {
        $this->contact = $contact;
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal', ['showModal' => $this->showModal]);
    }
}
