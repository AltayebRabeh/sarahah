<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('general.Change Photo') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('upload_photo', auth()->user()->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" name="photo">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('general.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('general.Save changes')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
