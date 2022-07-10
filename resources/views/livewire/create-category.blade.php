<div >
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#category-modal">
Add New Category
    </button>
    <div class="modal fade" wire:ignore.self id="category-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Add New Category')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="row">
                            <div class="col-12">
                                <label for="type" class="form-label ">{{__('Category Type')}}</label>
                                <select type="text" class="form-control form-select @error('type') is-invalid @enderror" id="type" wire:model.defer="type">
                                    <option selected value="">{{__('Select Type')}}</option>
                                    <option value="income" > {{__('Income')}} </option>
                                    <option value="expenses" > {{__('Expenses')}} </option>
                                </select>
                                @error('type')
                                <div class="text-danger text-sm">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12 my-3">
                                <label for="type" class="form-label ">{{__('Category Name')}}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="name">
                                @error('name')
                                <div class="text-danger text-sm">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="modal-footer d-flex align-items-center justify-content-center gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                    <button wire:click="save" form="newCategory" class="btn btn-primary">{{__('Save')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
