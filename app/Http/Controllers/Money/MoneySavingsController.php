<?php

namespace App\Http\Controllers\Money;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class MoneySavingsController extends Controller
{
    public function register() {
        return view("money/savings/register");
    }

    public function registerCheck(Request $request) {
        $validator = $request->validate([
            'savings'     => 'required|integer',
            'saving_date' => 'required',
        ]);
        return view("money/savings/confirm", compact(
            'request'
        ));
    }

    public function confirm(Request $request) {
        $saving = new Models\Saving();
        $saving->savings     = $request['savings'];
        $saving->saving_date = date("Y-m-01 H:i:s", strtotime($request['saving_date']));
        $saving->del_flg     = 0;
        $saving->created_at  = date("Y-m-d H:i:s");
        $saving->updated_at  = NULL;
        $saving->deleted_at  = NULL;
        $ret = $saving->save();
        if ($ret) {
            return redirect('/money/savings/complete');
        } else {
            return view("money/savings/confirm", compact(
                'request'
            ));
        }
    }

    public function complete() {
        return view("money/savings/complete");
    }
}
