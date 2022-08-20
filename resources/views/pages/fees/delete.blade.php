{{-- Delete The Fee --}}
<div class="modal fade" id="delete{{ $fee->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="deleteGradeLabel">
                    {{ __('msgs.delete', ['name' => __('fee.fees')]) }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('fees.destroy', $fee) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col">
                            <h5>{{ __('msgs.deleting_warning') }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('buttons.close') }}</button>
                    <x-button class="btn btn-danger">
                        {{ __('buttons.delete') }}
                    </x-button>
                </div>
            </form>

        </div>
    </div>
</div>
