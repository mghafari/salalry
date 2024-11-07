@php
    use App\Models\GuaranteeForm;
@endphp
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">جزییات درخواست شماره {{ $guaranteeForm->id }}</h5>
            <button type="button" class="close" aria-hidden="true" data-bs-dismiss="modal" aria-label="Close"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body table-responsive">
            <table class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>وضعیت قبلی</th>
                        <th>وضعیت جدید</th>
                        <th>علت رد یا تایید</th>
                        <th>ثبت شده توسط</th>
                        <th>تاریخ ثبت</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guaranteeFormDetails as $guaranteeFormDetail)
                        <tr style="height: 30px">
                            <td>{{ $guaranteeFormDetail->id }}</td>
                            <td><span class="badge {{ $guaranteeFormDetail->old_status ? GuaranteeForm::STATUS_COLOR[$guaranteeFormDetail->old_status] : '' }}">{{ $guaranteeFormDetail->old_status ? guaranteeForm::STATUS_TITLE[$guaranteeFormDetail->old_status] : '' }}</span></td>
                            <td><span class="badge {{ GuaranteeForm::STATUS_COLOR[$guaranteeFormDetail->new_status] }}">{{ $guaranteeFormDetail->new_status ? guaranteeForm::STATUS_TITLE[$guaranteeFormDetail->new_status] : '' }}</span></td>
                            <td>{{ $guaranteeFormDetail->comment ?? '' }}</td>
                            <td>{{ $guaranteeFormDetail->editor_name }}</td>
                            <td>{{verta($guaranteeFormDetail->created_at)->formatJalaliDate()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="closeModal()" class="btn btn-danger light" data-dismiss="modal">بستن</button>
        </div>
    </div>
</div>