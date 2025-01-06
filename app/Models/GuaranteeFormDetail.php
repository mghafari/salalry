<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuaranteeFormDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'gurantee_form_id',
        'editor_id',
        'editor_name',
        'comment',
        'old_status',
        'new_status'
    ];
}
