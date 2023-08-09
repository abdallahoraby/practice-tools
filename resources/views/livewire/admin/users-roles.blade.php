<div class="col-12 layout-top-spacing layout-spacing">
    <div class="card component-card_1">
        <div class="card-body ">
            <div class="row">
                <div class="col-6">
                    <h5 class="info-heading">* N-Code ( Ultimate Beliefs - Money and Power )</h5>
                </div>
                <div class="col-6 text-center">
                    <label class="switch s-icons s-outline s-outline-success mr-2">
                        <input type="checkbox" wire:model.defer="ncode_1" @if($ncode_1) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h5 class="info-heading">* N-Code ( Ultimate Beliefs - Relationships )</h5>
                </div>
                <div class="col-6 text-center">
                    <label class="switch s-icons s-outline s-outline-success mr-2">
                        <input type="checkbox" wire:model.defer="ncode_2" @if($ncode_2) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h5 class="info-heading">* N-Code ( Ultimate Beliefs - Validity )</h5>
                </div>
                <div class="col-6 text-center">
                    <label class="switch s-icons s-outline s-outline-success mr-2">
                        <input type="checkbox" wire:model.defer="ncode_3" @if($ncode_3) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h5 class="info-heading">* N-Code ( Ultimate Beliefs Subjective and Religious )</h5>
                </div>
                <div class="col-6 text-center">
                    <label class="switch s-icons s-outline s-outline-success mr-2">
                        <input type="checkbox" wire:model.defer="ncode_4" @if($ncode_4) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h5 class="info-heading">* Baseline</h5>
                </div>
                <div class="col-6 text-center">
                    <label class="switch s-icons s-outline s-outline-success mr-2">
                        <input type="checkbox" wire:model.defer="baseline" @if($baseline) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h5 class="info-heading">* Personal Assesment</h5>
                </div>
                <div class="col-6 text-center">
                    <label class="switch s-icons s-outline s-outline-success mr-2">
                        <input type="checkbox" wire:model.defer="personal" @if($personal) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h5 class="info-heading">* Wheel of Life</h5>
                </div>
                <div class="col-6 text-center">
                    <label class="switch s-icons s-outline s-outline-success mr-2">
                        <input type="checkbox" wire:model.defer="wheel" @if($wheel) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h5 class="info-heading">* Decision Making Wheel</h5>
                </div>
                <div class="col-6 text-center">
                    <label class="switch s-icons s-outline s-outline-success mr-2">
                        <input type="checkbox" wire:model.defer="decision" @if($decision) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h5 class="info-heading">* Define My Outcome</h5>
                </div>
                <div class="col-6 text-center">
                    <label class="switch s-icons s-outline s-outline-success mr-2">
                        <input type="checkbox" wire:model.defer="define" @if($define) checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="actions mt-5 text-center">
                <a href="{{URL::previous()}}" class="btn btn-outline-danger mr-5">Cancel</a>
                <button class="btn btn-info" onclick="save()">Save Updates</button>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        const save = () => {
            basicBlock()
            @this.call('save')
            .then((res) => $.unblockUI())
        }
    </script>
@endpush