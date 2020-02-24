<?php

namespace App\Http\Controllers\Money;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class MoneySalaryController extends Controller
{
    public function register() {
        return view("money/salary/register");
    }

    public function registerCheck(Request $request) {
        $validator = $request->validate([
            'salary'      => 'required|integer',
            'salary_date' => 'required',
        ]);
        return view("money/salary/confirm", compact(
            'request'
        ));
    }

    public function confirm(Request $request) {
        $salary = new Models\Salary();
        $salary->salary      = $request['salary'];
        $salary->salary_date = date("Y-m-01 H:i:s", strtotime($request['salary_date']));
        $salary->del_flg     = 0;
        $salary->created_at  = date("Y-m-d H:i:s");
        $salary->updated_at  = NULL;
        $salary->deleted_at  = NULL;
        $ret = $salary->save();
        if ($ret) {
            return redirect('/money/salary/complete');
        } else {
            return view("money/salary/confirm", compact(
                'request'
            ));
        }
    }

    public function complete() {
        return view("money/salary/complete");
    }
}
