<?php

namespace App\Http\Controllers\Money;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class MoneyRegisterController extends Controller
{
    public function index() {
        $arrCategory = $this->getCategory();
        return view("money/register", compact(
            'arrCategory'
        ));
    }

    public function registerCheck(Request $request) {
        $validator = $request->validate([
            'category' => 'required',
            'pay_bill' => 'required|integer',
            'pay_date' => 'required',
        ]);
        return view("money/confirm", compact(
            'request'
        ));
    }

    public function confirm(Request $request) {
        $management = new Models\Management();
        $management->category_id = 10;
        $management->pay_bill    = $request['pay_bill'];
        $management->pay_date    = date("Y-m-01 H:i:s", strtotime($request['pay_date']));
        $management->del_flg     = 0;
        $management->created_at  = date("Y-m-d H:i:s");
        $management->updated_at  = NULL;
        $management->deleted_at  = NULL;
        $ret = $management->save();
        if ($ret) {
            return redirect('/money/complete');
        } else {
            return view("money/confirm", compact(
                'request'
            ));
        }
    }

    public function complete() {
        return view("money/complete");
    }

    private function getCategory() {
        $builder = Models\Category::select(['category', 'category_name']);
        $builder = $builder->where('del_flg', '=', 0);
        
        return $builder->get()->toArray();
    }
}
