<?php

namespace App\Http\Controllers;

use App\AlertValuesModel;
use App\MailingListModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminConfigController extends Controller
{
    public function home()
    {
        $users = User::all();
        $alertValues = AlertValuesModel::all();
        $emailsList = MailingListModel::all();
        return (view('admin.adminSettings.config', compact(['users', 'alertValues', 'emailsList'])));
    }


    public function updateConfigValues(Request $request)
    {
        if ($request->user()->admin_level == 0) {
            return response()->json(['error' => 'Não Autorizado.'], 403);
        } else {
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


    public function mailListIndexAndEditor($id = null)
    {
        $emailToEdit = null;

        if (isset($id)) {
            $emailToEdit = MailingListModel::where('id', '=', $id)->first();
        }

        $mailList = MailingListModel::all();

        return (view('admin.adminSettings.mailList', compact(['mailList', 'emailToEdit'])));
    }


    public function storeEmailOnMailingList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $emailContact = new MailingListModel();

            $emailContact->email = $request->email;
            $emailContact->name = $request->name;

            if ($request->alertAboveValues == 'on') {
                $emailContact->alertAboveValues = 1;
            } else {
                $emailContact->alertAboveValues = 0;
            }

            if ($request->monthReports == 'on') {
                $emailContact->monthReports = 1;
            } else {
                $emailContact->monthReports = 0;
            }

            $emailContact->save();

            return redirect()->back()->with('message', 'E-mail adicionado com sucesso.');
        }
    }


    public function updateEmailOnMailingList(Request $request, $id)
    {
        if ($request->user()->admin_level == 0) {
            return response()->json(['error' => 'Não Autorizado.'], 403);
        } else {
            // Validator
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $mailContact = MailingListModel::where('id', '=', $id)->first();

                $mailContact->email = $request->email;
                $mailContact->name = $request->name;

                if ($request->alertAboveValues == 'on') {
                    $mailContact->alertAboveValues = 1;
                } else {
                    $mailContact->alertAboveValues = 0;
                }

                if ($request->monthReports == 'on') {
                    $mailContact->monthReports = 1;
                } else {
                    $mailContact->monthReports = 0;
                }

                $mailContact->save();

                $emailToEdit = null;
                $mailList = MailingListModel::all();
                return (view('admin.adminSettings.mailList', compact(['mailList', 'emailToEdit'])));
            }
        }
    }


    public function deleteEmailFromNotificationList(Request $request, $id)
    {
        if ($request->user()->admin_level == 0) {
            return response()->json(['error' => 'Não Autorizado.'], 403);
        } else {
            $mailContact = MailingListModel::where('id', '=', $id)->first();

            $mailContact->delete();
            return redirect()->back()->with('message', 'E-mail removido com sucesso.');
        }
    }


    public function giveSuperAdminToUser(Request $request, $id)
    {
        if ($request->user()->admin_level == 0) {
            return response()->json(['error' => 'Não Autorizado.'], 403);
        } else {
            $editedUserProfile = User::all()->where('id', '=', $id)->first();
            $editedUserProfile->admin_level = 1;

            $editedUserProfile->save();

            return redirect()->back()->with('message', 'Usuário movido para Super Admin com sucesso.');
        }
    }


    public function revokeSuperAdminToUser(Request $request, $id)
    {
        if ($request->user()->id == $id) {
            return redirect()->back()->with('message', 'Você não pode remover seu próprio estado de Super Admin.');
        }

        if ($request->user()->admin_level == 0) {
            return response()->json(['error' => 'Não Autorizado.'], 403);
        } else {
            $editedUserProfile = User::all()->where('id', '=', $id)->first();
            $editedUserProfile->admin_level = 0;

            $editedUserProfile->save();

            return redirect()->back()->with('message', 'Usuário movido para Super Admin com sucesso.');
        }
    }


    public function acessIndex($id = null)
    {
        $editUser = null;
        if ($id != null){
            $editUser = User::all()->where('id', '=', $id)->first();
        }

        $users = User::all();
        return (view('admin.adminSettings.platformAccess', compact('users', 'editUser')));
    }


    public function createAcessIndex(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|min:12',
            'password' => 'required|min:9',
        ]);

        if ($request->password != $request->passwordConfirmation) {
            return redirect()->back()->with('error-message', 'A confirmação de senha não está correta.');
        }

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = new User();

            $password = bcrypt($request->password);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $password;
            $user->save();

            return redirect()->route('adminAcessIndex');
        }
    }


    public function updateAcessData(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required|string|min:12',
            'password' => 'required|min:9',
        ]);

        if ($request->password != $request->passwordConfirmation) {
            return redirect()->back()->with('error-message', 'A confirmação de senha não está correta.');
        }

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->user()->admin_level == 0) {
                return response()->json(['error' => 'Não Autorizado.'], 403);
            } else {
                $user = User::where('id', '=', $id)->first();

                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->name = $request->name;


                $user->save();
                return redirect()->back()->with('message', 'Acesso editado com sucesso.');
            }
        }
    }


    public function deleteAcess(Request $request, $id)
    {
        if ($request->user()->admin_level == 0) {
            return response()->json(['error' => 'Não Autorizado.'], 403);
        } else {
            $user = User::where('id', '=', $id)->first();

            $user->delete();
            return redirect()->back()->with('message', 'Acesso removido com sucesso.');
        }
    }



}
