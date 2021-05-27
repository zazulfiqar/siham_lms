<?php

namespace App\Repositories;

use App\Helpers\Qs;
use App\Models\Application;
use App\Models\Expense_type;
use App\Models\Payment;
use App\Models\PaymentRecord;
use App\Models\Receipt;
use App\Models\StudentSurvey;

class SurvayRepo
{
    public function createSurvay($data)
    {
        return StudentSurvey::create($data);
    }


}
