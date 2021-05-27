<?php

namespace App\Repositories;

use App\Helpers\Qs;
use App\Models\Application;
use App\Models\Expense_type;
use App\Models\Payment;
use App\Models\PaymentRecord;
use App\Models\Receipt;

class ApplicationRepo
{
    public function createApplication($data)
    {
        return Application::create($data);
    }
    public function storeComplainResponse($data,$id)
    {
        return Application::find($id)->update($data);
//        return Application::create($data);
    }

}
