<?php

namespace App\Http\Controllers\Money;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Carbon\Carbon;
use DB;

class MoneyDetailController extends Controller
{
    const DISP_MONTH = 5;
    public function index() {
        $arrCategory    = $this->getCategory();
        $arrDispMonth   = $this->createDispMonth();
        $arrPayData     = $this->getPayData($arrDispMonth);
        $arrSalaryData  = $this->getSalaryData($arrDispMonth);
        $arrSavingData  = $this->getSavingData($arrDispMonth);
        $arrMoneyDetail = $this->createMoneyDetail($arrCategory, $arrDispMonth, $arrPayData, $arrSalaryData, $arrSavingData);

        return view("money/detail", compact(
            'arrMoneyDetail',
            'arrDispMonth'
        ));
    }

    private function getCategory() {
        $builder = Models\Category::select(['category', 'category_name']);
        $builder->where('del_flg', '=', 0);
        
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

    private function getPayData($arrDispMonth) {
        $startDate = date("Y-m-01 00:00:00", strtotime($arrDispMonth[0]. "/01 00:00:00"));
        $endDate   = date("Y-m-01 00:00:00", strtotime($arrDispMonth[self::DISP_MONTH - 1]. "/01 00:00:00"));
        // クレカ固定
        $builder = Models\Management::select(DB::raw("IFNULL(sum(pay_bill), 0) as pay_bill"));
        $builder->where('del_flg', '=', 0);
        $builder->where('category_id', '=', 10);
        $builder->whereBetween('pay_date', [$startDate, $endDate]);
        $builder->groupBy('pay_date');
        $builder->orderBy('pay_date');
        
        return $builder->get()->toArray();
    }

    private function getSalaryData($arrDispMonth) {
        $startDate = date("Y-m-01 00:00:00", strtotime($arrDispMonth[0]. "/01 00:00:00"));
        $endDate   = date("Y-m-01 00:00:00", strtotime($arrDispMonth[self::DISP_MONTH - 1]. "/01 00:00:00"));
        $builder = Models\Salary::select(DB::raw("IFNULL(sum(salary), 0) as salary"));
        $builder->where('del_flg', '=', 0);
        $builder->whereBetween('salary_date', [$startDate, $endDate]);
        $builder->groupBy('salary_date');
        $builder->orderBy('salary_date');
        
        return $builder->get()->toArray();
    }

    private function getSavingData($arrDispMonth) {
        $startDate = date("Y-m-01 00:00:00", strtotime($arrDispMonth[0]. "/01 00:00:00"));
        $endDate   = date("Y-m-01 00:00:00", strtotime($arrDispMonth[self::DISP_MONTH - 1]. "/01 00:00:00"));
        $builder = Models\Saving::select(DB::raw("IFNULL(sum(savings), 0) as savings"));
        $builder->where('del_flg', '=', 0);
        $builder->whereBetween('saving_date', [$startDate, $endDate]);
        $builder->groupBy('saving_date');
        $builder->orderBy('saving_date');
        
        return $builder->get()->toArray();
    }

    private function createMoneyDetail($arrCategory, $arrDispMonth, $arrPayData, $arrSalaryData, $arrSavingData) {
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
                        if (array_key_exists($key, $arrPayData)) {
                            $tmpData = $arrPayData[$key]['pay_bill'];
                        } else {
                            $tmpData = 0;
                        }
                        $tmpTotal += $tmpData;
                        break;
                    case 'total':
                        $tmpData = $tmpTotal;
                        break;
                    case 'salary':
                        if (array_key_exists($key, $arrSalaryData)) {
                            $tmpSalary = $tmpData = $arrSalaryData[$key]['salary'];
                        } else {
                            $tmpSalary = $tmpData = 0;
                        }
                        break;
                    case 'withdrawal_amount':
                        $tmpData = 0;
                        break;
                    case 'savings':
                        if (array_key_exists($key, $arrSavingData)) {
                            $tmpSavings = $tmpData = $arrSavingData[$key]['savings'];
                        } else {
                            $tmpSavings = $tmpData = 0;
                        }
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
