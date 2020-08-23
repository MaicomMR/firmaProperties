<?php

namespace App\Http\Controllers;

use App\AlertValuesModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminConfigController extends Controller
{
    public function home()
    {
        $users = User::all();
        $alertValues = AlertValuesModel::all();
        return(view('admin.adminSettings.config', compact(['users', 'alertValues'])));
    }

    public function updateConfigValues(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'write_off_value_alert' => 'required|numeric|max:20000|min:0',
            'day_write_off_value_alert' => 'required|numeric|max:50000|min:0',
            'month_write_off_value_alert' => 'required|numeric|max:200000|min:0',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            AlertValuesModel::where('id', 1)->update([
                'write_off_value_alert' => $request->write_off_value_alert,
                'day_write_off_value_alert' => $request->day_write_off_value_alert,
                'month_write_off_value_alert' => $request->month_write_off_value_alert
            ]);
            return redirect()->back()->with('message', 'Valores atualizados com sucesso.');
        }
    }
}
