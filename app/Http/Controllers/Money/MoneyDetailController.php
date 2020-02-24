<?php

namespace App\Http\Controllers\Money;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Carbon\Carbon;

class MoneyDetailController extends Controller
{
    const DISP_MONTH = 5;
    public function index() {
        $arrCategory = $this->getCategory();
        $arrDispMonth = $this->createDispMonth();
        $arrMoneyDetail = $this->createMoneyDetail($arrCategory, $arrDispMonth);

        return view("money/detail", compact(
            'arrMoneyDetail',
            'arrDispMonth'
        ));
    }

    private function getCategory() {
        $builder = Models\Category::select(['category', 'category_name']);
        $builder = $builder->where('del_flg', '=', 0);
        
        return $builder->get()->toArray();
    }

    private function createDispMonth() {
        // 表示対象月を取得する
        $dt = Carbon::now()->firstOfMonth();
        $arrDispMonth = array();
        for ($cnt = 0; $cnt < self::DISP_MONTH; $cnt++) {
            if ($cnt == 0) {
                $arrDispMonth[$cnt] = $dt->subMonth()->format("Y/m");
            } else {
                $arrDispMonth[$cnt] = $dt->addMonth()->format("Y/m");
            }
        }
        return $arrDispMonth;
    }

    private function createMoneyDetail($arrCategory, $arrDispMonth) {
        foreach ($arrDispMonth as $key => $dispMonth) {
            $tmpTotal = 0;
            $tmpSalary = 0;
            $tmpSavings = 0;
            foreach ($arrCategory as &$category) {
                if (!array_key_exists("data", $category)) {
                    $category['data'] = array();
                }
                switch ($category['category']) {
                    case 'rent':
                        $tmpData = 70000;
                        $tmpTotal += $tmpData;
                        break;
                    case 'mobile_fee':
                        $tmpData = 15000;
                        $tmpTotal += $tmpData;
                        break;
                    case 'net':
                        $tmpData = 10000;
                        $tmpTotal += $tmpData;
                        break;
                    case 'gym':
                        $tmpData = 10000;
                        $tmpTotal += $tmpData;
                        break;
                    case 'utility_costs':
                        $tmpData = 15000;
                        $tmpTotal += $tmpData;
                        break;
                    case 'food_expenses':
                        $tmpData = 40000;
                        $tmpTotal += $tmpData;
                        break;
                    case 'scholarship':
                        $tmpData = 10000;
                        $tmpTotal += $tmpData;
                        break;
                    case 'pass_price':
                        $tmpData = 15000;
                        $tmpTotal += $tmpData;
                        break;
                    case 'entertainment_expenses':
                        $tmpData = 10000;
                        $tmpTotal += $tmpData;
                        break;
                    case 'credit':
                        $tmpData = 20000;
                        $tmpTotal += $tmpData;
                        break;
                    case 'total':
                        $tmpData = $tmpTotal;
                        break;
                    case 'salary':
                        $tmpSalary = $tmpData = 270000;
                        break;
                    case 'withdrawal_amount':
                        $tmpData = 0;
                        break;
                    case 'savings':
                        $tmpSavings = $tmpData = 20000;
                        break;
                    case 'balance1':
                        $tmpData = $tmpSalary - $tmpTotal;
                        break;
                    case 'balance2':
                        $tmpData = $tmpSalary - $tmpTotal - $tmpSavings;
                        break;
                }
                $category['data'][$key] = $tmpData;
            }
        }
        return $arrCategory;
    }
}
