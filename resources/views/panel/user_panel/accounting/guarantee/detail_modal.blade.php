@php
    use App\Models\GuaranteeForm;
@endphp
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">جزییات درخواست شماره {{ $guaranteeForm->id }}</h5>
            <button type="button" class="close" aria-hidden="true" data-bs-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table id="example2" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>وضعیت قبلی</th>
                        <th>وضعیت جدید</th>
                        <th>علت رد یا تایید</th>
                        <th>ثبت شده توسط</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guaranteeFormDetails as $guaranteeFormDetail)
                        <tr>
                            <td>{{ $guaranteeFormDetail->id }}</td>
                            <td>{{ $guaranteeFormDetail->old_status ? guaranteeForm::STATUS_TITLE[$guaranteeFormDetail->old_status] : '' }}</td>
                            <td>{{ $guaranteeFormDetail->new_status ? guaranteeForm::STATUS_TITLE[$guaranteeFormDetail->new_status] : '' }}</td>
                            <td>{{ $guaranteeFormDetail->comment ?? '' }}</td>
                            <td>{{ $guaranteeFormDetail->editor_name }}</td>
    
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">بستن</button>
        </div>
    </div>
</div>