@php
    use App\Models\GuaranteeForm;
@endphp
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">ثبت وضعیت برای درخواست {{ $guaranteeForm->user->name() }}</h5>
            <button type="button" class="close" aria-hidden="true" data-bs-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body table-responsive">
            <form id="commentForm" action="" method="POST">
                @csrf
                <label for="comment">توضیحات</label>
                <textarea id="comment" class="form-control" cols="20" rows="10" name="comment"></textarea>
            
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-success" 
                        onclick="submitForm('{{ route('guaranteeFormList.confirm', $guaranteeForm->id) }}')">تایید</button>
                    <button type="button" class="btn btn-danger" 
                        onclick="submitForm('{{ route('guaranteeFormList.reject', $guaranteeForm->id) }}')">رد</button>
                </div>
                </form>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">بستن</button>
                </div>
        </div>
</div>
                
<script>
    function submitForm(route) {
        // Set the form action to the desired route
        document.getElementById('commentForm').action = route;
        // Submit the form
        document.getElementById('commentForm').submit();
    }
</script>
                