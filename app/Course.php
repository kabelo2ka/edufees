<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const DONATION_STATUS_IN_PROGRESS = 'in_progress';
    const DONATION_STATUS_PAUSED = 'paused';
    const DONATION_STATUS_CANCELLED = 'cancelled';
    const DONATION_STATUS_COMPLETE = 'complete';
}
