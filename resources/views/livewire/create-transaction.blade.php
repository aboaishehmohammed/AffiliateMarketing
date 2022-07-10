<form wire:submit.prevent="createTransaction" id="newTransactions">
    <div class="mt-3 d-flex justify-content-between">
        <div class=" col-7">
            <div class="card  ">
                <div class="card-header bg-dark h5 text-center text-white">
                    {{__('Create New Transactions')}}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="type" class="form-label ">{{__('Transaction Type')}}</label>
                        <select type="text" class="form-control form-select @error('type') is-invalid @enderror" id="type" wire:model="type">
                            <option selected value="">{{__('Select Category Type ')}}</option>
                            <option value="income" > {{__('Income')}} </option>
                            <option value="expenses" > {{__('Expenses')}} </option>
                        </select>
                        @error('type')
                        <div class="text-danger text-sm">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 row align-items-center">
                        <div class="col-12">
                            <label for="category_id" class="form-label ">{{__('Category')}}</label>
                        </div>
                        <div class="col-10">
                            <select type="text" class="form-control  form-select @error('category_id') is-invalid @enderror" id="category_id" wire:model="category_id">
                                <option selected value="">{{__(' Select Category ')}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                                @endforeach
                            </select>


                        </div>
                        @error('category_id')
                        <div class="text-danger text-sm">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label ">{{__('Amount')}}</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step=".01" min="0" value="0" class="form-control @error('amount') is-invalid @enderror" id="amount" wire:model="amount" placeholder="0.00">
                        </div>
                        @error('amount')
                        <div class="text-danger text-sm">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="note" class="form-label ">{{__('Note')}}</label>
                        <textarea class="form-control @error('note') is-invalid @enderror" wire:model="note" id="note" cols="30" rows="5"></textarea>
                        @error('note')
                        <div class="text-danger text-sm">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <button type="submit" form="newTransactions" class=" btn btn-dark">{{__('Save')}}</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-4">
                <livewire:create-category />
        </div>
    </div>
</form>


