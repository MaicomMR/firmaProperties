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
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Validator;
use function Illuminate\Support\Facades\Blade;
use PDF;


class Estate extends Controller
{


    /**
     * Display the specified resource.
     *
     */
    public function home()
    {

        //TODO: CRIAR QUERY >> DECENTE << PARA POPULAR OS GRÁFICOS
        $categoryCount = EstateModel::select('categories_id', DB::raw('count(*) as total'))
            ->groupBy('categories_id')
            ->get();

        $subCategoryCount = EstateModel::select('sub_categories_id', DB::raw('count(*) as total'))
            ->groupBy('sub_categories_id')
            ->get();

        $totalEstatesValue = EstateModel::sum('value');
        $totalEstatesCount = EstateModel::count('id');
        $totalAssignedEstatesCount = EstateModel::where('employee_id', '!=', null)->count();
        $totalUnassignedEstatesCount = EstateModel::where('employee_id', '=', null)->count();
        $totalDisabledEstatesCount = EstateModel::onlyTrashed()->count();

        //dd($totalDisabledEstatesCount);

        $categoryNumber = [];
        $categoryLabel = [];
        $categoryColor = [];

        $subCategoryNumber = [];
        $subCategoryLabel = [];
        $subCategoryColor = [];

        foreach ($categoryCount as $category) {
            array_push($categoryNumber, $category->total);
            $estateLabelQuery = Category::all()->where('id', '=', $category->categories_id)->first();
            array_push($categoryLabel, $estateLabelQuery->name);
        }

        foreach ($subCategoryCount as $subCategory) {
            array_push($subCategoryNumber, $subCategory->total);
            $subCategoryLabelQuery = SubCategory::all()->where('id', '=', $subCategory->sub_categories_id)->first();
            array_push($subCategoryLabel, $subCategoryLabelQuery->name);
        }

        function generateColor($NumberOfColors)
        {
            $colorsArray = [];

            for ($color = 0; $color < $NumberOfColors; $color++) {
                $colorRed = rand(40, 240);
                $colorGreen = rand(40, 240);
                $colorBlue = rand(40, 240);
                $alpha = 0.75;

                $finalColor = 'rgba(' . $colorRed . ', ' . $colorGreen . ', ' . $colorBlue . ', ' . $alpha . ')';
                array_push($colorsArray, $finalColor);
            }

            return $colorsArray;
        }

        $categoryColor = generateColor(count($categoryNumber));
        $subCategoryColor = generateColor(count($subCategoryNumber));

        //dd($subCategoryColor);


        return view('home.homeBasePage')->with([
            'categoryNumber' => $categoryNumber,
            'categoryLabel' => $categoryLabel,
            'categoryColor' => $categoryColor,
            'subCategoryNumber' => $subCategoryNumber,
            'subCategoryLabel' => $subCategoryLabel,
            'subCategoryColor' => $subCategoryColor,
            'totalEstatesValue' => $totalEstatesValue,
            'totalEstatesCount' => $totalEstatesCount,
            'totalAssignedEstatesCount' => $totalAssignedEstatesCount,
            'totalUnassignedEstatesCount' => $totalUnassignedEstatesCount,
            'totalDisabledEstatesCount' => $totalDisabledEstatesCount,
        ]);
    }


    public function search($id)
    {

        $Estate = \App\EstateModel::find($id);

        $categoriesPlucked = Category::pluck('name', 'id');
        $subCategoriesPlucked = SubCategory::pluck('name', 'id');
        $sellersPlucked = Seller::pluck('name', 'id');
        $billOfSalePlucked = BillOfSale::whereDate('updated_at', '>=', now()->subDays(7))->pluck('billNumber', 'id');

        return view('admin.add')->with([
            'categoriesPlucked' => $categoriesPlucked,
            'subCategoriesPlucked' => $subCategoriesPlucked,
            'estate_object' => $Estate,
            'billOfSale' => $billOfSalePlucked,
            'sellersPlucked' => $sellersPlucked,
        ]);
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
        $EstateList = EstateModel::where('name', 'like', '%' . $request->estateNameLike . '%')->paginate(30);
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
        $activeEstateCount = EstateModel::all()->count();
        $inactiveEstateCount = EstateModel::onlyTrashed()->count();
        $EmployeeList = EmployeeModel::all();

        return view('admin.estates.estateIndex')
            ->with(['EstateList' => $EstateList])
            ->with(['EmployeeList' => $EmployeeList])
            ->with(['activeEstateCount' => $activeEstateCount])
            ->with(['inactiveEstateCount' => $inactiveEstateCount]);
    }

    public function highValueEstates()
    {
        $EstateList = EstateModel::where('value', '>=', 3000)->paginate(30);
        $activeEstateCount = EstateModel::all()->count();
        $inactiveEstateCount = EstateModel::onlyTrashed()->count();
        $EmployeeList = EmployeeModel::all();

        return view('admin.estates.estateIndex')
            ->with(['EstateList' => $EstateList])
            ->with(['EmployeeList' => $EmployeeList])
            ->with(['activeEstateCount' => $activeEstateCount])
            ->with(['inactiveEstateCount' => $inactiveEstateCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesPlucked = Category::pluck('name', 'id');
        $subCategoriesPlucked = SubCategory::pluck('name', 'id');
        $billOfSalePlucked = BillOfSale::whereDate('updated_at', '>=', now()->subDays(7))->pluck('billNumber', 'id');
        $sellersPlucked = Seller::pluck('name', 'id');

        return view('admin.add')->with([
            'categoriesPlucked' => $categoriesPlucked,
            'subCategoriesPlucked' => $subCategoriesPlucked,
            'billOfSale' => $billOfSalePlucked,
            'sellersPlucked' => $sellersPlucked,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [ // <---
            'name' => 'required|max:255|min:2',
            'label_id' => 'required|unique:estates|numeric',
            'value' => 'required|numeric',
            'categories_id' => 'required',
            'sub_categories_id' => 'required',
        ]);

        if ($validator->fails())
        {
            return back()
                ->withErrors($validator)
                ->withInput();
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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
            return back()
                ->withErrors($validator)
                ->withInput();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        \Carbon\Carbon::setLocale('pt_BR');

        $estate = EstateModel::find($id);

        // Faz a busca pelo último histórico do bem
        // Do a search for the last history from this estate
        $estateHistory = EstateHistoryModel::where('estate_id', '=', $id)->latest('created_at')->first();

        $unassignEstateHistory = new EstateHistoryModel();
        $unassignEstateHistory->admin_id = Auth::user()->id;

        //Se o patrimônio já registro de atribuiçção
        if (!empty($estateHistory->assign)) {

            //Se ele estiver atribuído a algum colaborador
            if ($estateHistory->assign = 1) {
                $unassignEstateHistory->employee_id = $estateHistory->employee_id;
                $unassignEstateHistory->estate_id = $estate->id;
                $unassignEstateHistory->unassign = 1;
                $unassignEstateHistory->save();
            }

        //Se o patrimônio nunca foi atribuído a ninguém
        } else {
            $unassignEstateHistory->estate_id = $estate->id;
            $unassignEstateHistory->unassign = 1;
            $unassignEstateHistory->save();
        }

        //E-mail Alert system
        $alertValues = AlertValuesModel::all()->first();

        $valueAlert = $alertValues->write_off_value_alert;
        $dayoffAlert = $alertValues->day_write_off_value_alert;
        $monthAlertValue = $alertValues->month_write_off_value_alert;


        $todayDeletedEstatesValue = EstateModel::onlyTrashed()->where('deleted_at', '>=', now()->startOfDay())->sum('value');
        $thisMonthDeletedEstatesValue = EstateModel::onlyTrashed()->where('deleted_at', '>=', now()->startOfMonth())->sum('value');

        if ($valueAlert > 0) {
            if ($estate->value >= $valueAlert) {
                $emailTitle = "EstateCare - Alerta";
                $emailSubject = "Alerta de baixa a cima do valor de avisos";
                $estatesObject = $estate;

                $emails = MailingListModel::all()->where('alertAboveValues', '=', '1');

                foreach ($emails as $email) {
                    Mail::to($email->email)->send(new DayEstateValueAlert($email->email, $emailTitle, $emailSubject, null));
                }
            }
        }

        if ($dayoffAlert > 0) {
            if ($todayDeletedEstatesValue >= $dayoffAlert) {
                if ($estate->value >= $valueAlert) {
                    $emailTitle = "EstateCare - Alerta";
                    $emailSubject = "Alerta Diário - baixa de bem a cima do valor de alerta foi removido da base de dados";
                    $estatesObject = EstateModel::onlyTrashed()->where('deleted_at', '>=', now()->startOfDay())->get();

                    $emails = MailingListModel::all()->where('alertAboveValues', '=', '1');

                    foreach ($emails as $email) {
                        Mail::to($email->email)->send(new DayEstateValueAlert($email->email, $emailTitle, $emailSubject, $estatesObject));
                    }
                }
            }
        }

        if ($monthAlertValue > 0) {
            if ($thisMonthDeletedEstatesValue >= $monthAlertValue) {
                if ($todayDeletedEstatesValue >= $dayoffAlert) {
                    if ($estate->value >= $valueAlert) {
                        $emailTitle = "EstateCare - Alerta";
                        $emailSubject = "Alerta Mensal - baixa de bem a cima do valor de alerta foi removido da base de dados";
                        $estatesObject = EstateModel::onlyTrashed()->where('deleted_at', '>=', now()->startOfMonth())->get();

                        $emails = MailingListModel::all()->where('alertAboveValues', '=', '1');

                        foreach ($emails as $email) {
                            Mail::to($email->email)->send(new DayEstateValueAlert($email->email, $emailTitle, $emailSubject, $estatesObject));
                        }
                    }
                }
            }
        }
        //End of E-mail Alert system

        $estate->delete();


        return redirect()->back()->with('message', 'Patrimônio removido com sucesso.');
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
        $estateHistory->admin_id = Auth::user()->id;
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

        $data = date('d/m/Y : H:m');
        $dateQuery = $data;

        $pdf = PDF::loadView('pdf.estate-active-list-pdf', compact('estateList'), compact('dateQuery'));

        return $pdf->stream();

    }

    public function printDeletedEstateList()
    {

        $estateList = EstateModel::onlyTrashed()->get();

        $data = date('d/m/Y : H:m');
        $dateQuery = $data;

        $pdf = PDF::loadView('pdf.estate-deleted-list-pdf', compact('estateList'), compact('dateQuery'));

        return $pdf->stream();

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
