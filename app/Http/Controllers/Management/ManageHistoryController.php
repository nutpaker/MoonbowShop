<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logs;
use JavaScript;

class ManageHistoryController extends Controller
{

    public function index()
    {

        $history = Logs::orderBy('created_at', 'desc')->where('user_id', $this->getLoggedinUser()->id)->get()->take(40);

        JavaScript::put([
            'data' => $history,
        ]);

        return view('manage.history.history', [
            'history' => $history,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
