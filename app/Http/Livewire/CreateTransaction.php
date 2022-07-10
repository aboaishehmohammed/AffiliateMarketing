<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateTransaction extends Component
{
    public $type;
    public $category_id;
    public $amount;
    public $note;

    protected $rules = [
        'type' => 'required',
        'category_id' => 'required',
        'amount' => 'required|numeric',
        'note' => 'nullable|max:100',
    ];

    public function render()
    {

        return view('livewire.create-transaction', [
            'categories' => auth()->user()->categories()->where('type', $this->type)->get(),
        ]);
    }

    public function createTransaction()
    {
        $data = $this->validate();

        if ($this->type === 'expenses' && ($this->amount > auth()->user()->wallet->balance)) {
            session()->flash('error', 'Sorry your wallet balance not enough! ');
            return redirect()->route('transactions.create');

        } else {

            $wallet = auth()->user()->wallet;

            $wallet->transactions()->create($data);

            $this->type == 'income' ? $wallet->balance += $this->amount : $wallet->balance -= $this->amount;

            $wallet->save();

            session()->flash('success', 'Transaction Saved Successfully !');

            $this->reset();

            return redirect()->route('transactions.create');

        }

    }
}
