<?php


namespace App\Http\Controllers;

use App\AlertValuesModel;
use App\BillOfSale;
use App\EmployeeModel;
use App\EstateHistoryModel;
use \App\EstateModel;
use \App\Category;
use App\Mail\DayEstateValueAlert;
use App\MailingListModel;
use App\Seller;
use \App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;
use function Illuminate\Support\Facades\Blade;
use PDF;


class Estate extends Controller
{
    public function search($id)
    {
        $Estate = \App\EstateModel::find($id);
        $estateFormData = $this->provideEstateFormData();

        return view('admin.add')->with([
            'estate_object' => $Estate,
            'categoriesPlucked' => $estateFormData[0],
            'subCategoriesPlucked' => $estateFormData[1],
            'billOfSale' => $estateFormData[2],
            'sellersPlucked' => $estateFormData[3],
        ]);
    }

    public function create()
    {
        $estateFormData = $this->provideEstateFormData();

        return view('admin.add')->with([
            'categoriesPlucked' => $estateFormData[0],
            'subCategoriesPlucked' => $estateFormData[1],
            'sellersPlucked' => $estateFormData[2],
            'billOfSale' => $estateFormData[3],
        ]);
    }

    public function provideEstateFormData()
    {
        $categoriesPlucked = Category::pluck('name', 'id');
        $subCategoriesPlucked = SubCategory::pluck('name', 'id');
        $sellersPlucked = Seller::pluck('name', 'id');
        $billOfSalePlucked = BillOfSale::whereDate('updated_at', '>=', now()->subDays(7))->pluck('billNumber', 'id');

        return [$categoriesPlucked, $subCategoriesPlucked, $sellersPlucked, $billOfSalePlucked];
    }

    public function index()
    {
        $EstateList = EstateModel::paginate(30);
        $activeEstateCount = EstateModel::all()->count();
        $inactiveEstateCount = EstateModel::onlyTrashed()->count();
        $EmployeeList = EmployeeModel::all();

        return view('admin.estates.estateIndex')
            ->with(['EstateList' => $EstateList])
            ->with(['EmployeeList' => $EmployeeList])
            ->with(['activeEstateCount' => $activeEstateCount])
            ->with(['inactiveEstateCount' => $inactiveEstateCount]);
    }


    public function searchByName(Request $request)
    {
        $EstateList = EstateModel::where('name', 'like', '_' . $request->estateNameLike . '%')->paginate(30);
        $activeEstateCount = EstateModel::all()->count();
        $inactiveEstateCount = EstateModel::onlyTrashed()->count();
        $EmployeeList = EmployeeModel::all();

        return view('admin.estates.estateIndex')
            ->with(['EstateList' => $EstateList])
            ->with(['EmployeeList' => $EmployeeList])
            ->with(['activeEstateCount' => $activeEstateCount])
            ->with(['inactiveEstateCount' => $inactiveEstateCount]);
    }


    public function availableEstatesIndex()
    {
        $EstateList = EstateModel::where('employee_id', '=', null)->paginate(30);

        $estatesDataToPopulateHeaderMenu = $this->getEstateDataForHeaderMenu();

        return view('admin.estates.estateIndex')
            ->with(['EstateList' => $EstateList])
            ->with(['activeEstateCount' => $estatesDataToPopulateHeaderMenu['activeEstateCount']])
            ->with(['inactiveEstateCount' => $estatesDataToPopulateHeaderMenu['inactiveEstateCount']])
            ->with(['EmployeeList' => $estatesDataToPopulateHeaderMenu['employeeList']]);
    }

    public function highValueEstates()
    {
        $EstateList = EstateModel::where('value', '>=', 3000)->paginate(30);
        $estatesDataToPopulateHeaderMenu = $this->getEstateDataForHeaderMenu();

        return view('admin.estates.estateIndex')
            ->with(['EstateList' => $EstateList])
            ->with(['activeEstateCount' => $estatesDataToPopulateHeaderMenu['activeEstateCount']])
            ->with(['inactiveEstateCount' => $estatesDataToPopulateHeaderMenu['inactiveEstateCount']])
            ->with(['EmployeeList' => $estatesDataToPopulateHeaderMenu['employeeList']]);
    }

    public function getEstateDataForHeaderMenu()
    {
        $activeEstateCount = EstateModel::all()->count();
        $inactiveEstateCount = EstateModel::onlyTrashed()->count();
        $employeeList = EmployeeModel::all();

        return ['activeEstateCount' => $activeEstateCount,
            'inactiveEstateCount' => $inactiveEstateCount,
            'employeeList' => $employeeList];
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|min:2',
            'label_id' => 'required|unique:estates|numeric',
            'value' => 'required|numeric',
            'categories_id' => 'required',
            'sub_categories_id' => 'required',
        ]);

        if ($validator->fails()) {
            $this->returnWithError($validator);
        } else {

            $estate = new EstateModel();

            $estate->name = $request->name;
            $estate->value = $request->value;
            $estate->label_id = $request->label_id;
            $estate->categories_id = $request->categories_id;
            $estate->sub_categories_id = $request->sub_categories_id;
            $estate->seller_id = $request->seller_id;
            $estate->observation = $request->observation;
            $estate->assurance_cover_date = $request->assurance_cover_date;
            $estate->estate_photo = null;

            $estate->save();
            return redirect()->back()->with('message', 'Patrimônio adicionado com sucesso.');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ // <---
            'name' => 'required|max:255|min:2',
            'label_id' => 'required|',
            'value' => 'required|numeric',
            'categories_id' => 'required',
            'sub_categories_id' => 'required',
        ]);

        if ($validator->fails()) {
            $this->returnWithError($validator);
        } else {
            $estate = EstateModel::find($id);

            $estate->name = $request->name;
            $estate->value = $request->value;
            $estate->label_id = $request->label_id;
            $estate->categories_id = $request->categories_id;
            $estate->sub_categories_id = $request->sub_categories_id;
            $estate->seller_id = $request->seller_id;
            $estate->observation = $request->observation;
            $estate->assurance_cover_date = $request->assurance_cover_date;
            $estate->estate_photo = null;

            $estate->save();
            return redirect()->back()->with('message', 'Patrimônio editado com sucesso.');
        }
    }


    public function returnWithError($error)
    {
        return back()
            ->withErrors($error)
            ->withInput();
    }

    public function destroy($id)
    {
        \Carbon\Carbon::setLocale('pt_BR');

        $estate = EstateModel::find($id);

        $estateHistory = EstateHistoryModel::where('estate_id', '=', $id)->latest('created_at')->first();

        $unassignEstateHistory = new EstateHistoryModel();
        $unassignEstateHistory->admin_id = Auth::id();

        $unassignEstateHistory->estate_id = $estate->id;
        $unassignEstateHistory->unassign = 1;

        if (!empty($estateHistory->assign) && $estateHistory->assign = 1) {
            $unassignEstateHistory->employee_id = $estateHistory->employee_id;
        }

        $unassignEstateHistory->save();

        $alertValues = $this->getAlertValues();

        $todayDeletedEstatesValue = EstateModel::onlyTrashed()
            ->where('deleted_at', '>=', now()->startOfDay())->sum('value');
        $thisMonthDeletedEstatesValue = EstateModel::onlyTrashed()
            ->where('deleted_at', '>=', now()->startOfMonth())->sum('value');

        $estate->delete();

        if ($alertValues['valueAlert'] > 0 && $estate->value >= $alertValues['valueAlert']) {
            $this->mailSender(
                'EstateCare - Alerta',
                'Alerta de baixa a cima do valor de avisos',
                null);
        }

        if ($alertValues['dayoffAlert'] > 0 && $todayDeletedEstatesValue >= $alertValues['dayoffAlert']) {
            $estatesObject = EstateModel::onlyTrashed()->where('deleted_at', '>=', now()->startOfDay())->get();

            $this->mailSender(
                'EstateCare - Alerta',
                'Alerta Diário - Valor de baixas diário excedido',
                $estatesObject);
        }

        if ($alertValues['monthAlertValue'] > 0 && $thisMonthDeletedEstatesValue >= $alertValues['monthAlertValue']) {
            $estatesObject = EstateModel::onlyTrashed()->where('deleted_at', '>=', now()->startOfMonth())->get();

            $this->mailSender(
                'EstateCare - Alerta',
                'Alerta - Valor de baixas mensal excedido',
                $estatesObject);
        }

        return redirect()->back()->with('message', 'Patrimônio removido com sucesso.');
    }


    public function getAlertValues()
    {
        $alertValues = AlertValuesModel::all()->first();

        return [
            'valueAlert' => $alertValues->write_off_value_alert,
            'dayoffAlert' => $alertValues->day_write_off_value_alert,
            'monthAlertValue' => $alertValues->month_write_off_value_alert
        ];
    }


    public function mailSender(string $mailTitle, string $mailSubject, object $estates)
    {
        $emails = MailingListModel::all()->where('alertAboveValues', '=', '1');

        foreach ($emails as $email) {
            Mail::to($email->email)->send(new DayEstateValueAlert($email->email, $mailTitle, $mailSubject, $estates));
        }
    }


    public function assignEstateToEmployee($estateId, $employeeId)
    {
        if ($employeeId == 'null') {
            return redirect()->back()->with('message', 'Ops... parece que você não selecionou um colaborador para atribuir este patrimônio');
        }

        $estate = EstateModel::find($estateId);
        $employee = EmployeeModel::find($employeeId);
        $estate->employee_id = $employeeId;
        $estate->last_assign_date = now();

        $estateHistory = new EstateHistoryModel();
        $estateHistory->employee_id = $employeeId;
        $estateHistory->admin_id = Auth::id();
        $estateHistory->estate_id = $estateId;
        $estateHistory->assign = '1';

        $estateHistory->save();
        $estate->save();

        return redirect()->back()->with('message', 'Patrimônio ' . $estate->name . ' atribuído ao colaborador ' . $employee->name . ' com sucesso.');
    }


    public function unassignEstateToEmployee($estateId, $employeeId)
    {

        $estate = EstateModel::find($estateId);
        $estate->employee_id = null;
        $estate->last_assign_date = null;

        $estateHistory = new EstateHistoryModel();
        $estateHistory->employee_id = $employeeId;
        $estateHistory->estate_id = $estateId;
        $estateHistory->admin_id = Auth::user()->id;
        $estateHistory->unassign = '1';

        $estateHistory->save();
        $estate->save();

        return redirect()->back()->with('message', 'Patrimônio ' . $estate->name . ' desatribuído do colaborador com sucesso.');
    }


    public function printEstateList()
    {
        $estateList = EstateModel::all()->sortByDesc('employee_id');
        $dateQuery = $this->getActualFormatedDate();
        $pdf = PDF::loadView('pdf.estate-active-list-pdf', compact('estateList'), compact('dateQuery'));

        return $pdf->stream();
    }


    public function printDeletedEstateList()
    {
        $estateList = EstateModel::onlyTrashed()->get();
        $dateQuery = $this->getActualFormatedDate();
        $pdf = PDF::loadView('pdf.estate-deleted-list-pdf', compact('estateList'), compact('dateQuery'));

        return $pdf->stream();
    }


    public function getActualFormatedDate()
    {
        $date = date('d/m/Y : H:m');
        return $date;
    }


    public function historyIndex()
    {
        $estateHistories = EstateHistoryModel::all()->sortByDesc('created_at');

        return view('admin.estates.estateHistory')->with([
            'estateHistories' => $estateHistories
        ]);
    }


    public function activeAssurance()
    {
        $estatesWithActiveAssurance = EstateModel::all()->where('assurance_cover_date', '>', now());

        return view('admin.estates.estateWithActiveAssurance')->with([
            'estatesWithActiveAssurance' => $estatesWithActiveAssurance
        ]);
    }
}
