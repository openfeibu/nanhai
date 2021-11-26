<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;

class EmployeeGroup extends BaseModel
{
    use Filer, Hashids, Slugger;

    public $timestamps = false;

    protected $config = 'model.arrange.employee_group';

}