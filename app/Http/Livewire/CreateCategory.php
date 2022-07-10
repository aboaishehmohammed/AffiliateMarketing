<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateCategory extends Component
{
    public $type;
    public $name;

    protected $rules = [
        'type' => 'required',
        'name' => 'required',
    ];
    public function render()
    {
        return view('livewire.create-category');
    }

    public function save()
    {
        $data = $this->validate();

        auth()->user()->categories()->create($data);

        session()->flash('success', 'Category Saved Successfully !');

        return redirect()->route('transactions.create');
    }
}
