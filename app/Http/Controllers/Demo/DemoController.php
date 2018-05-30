<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Repositories\Ricky\MessageRepository;
use Auth;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    protected $oMessageRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MessageRepository $oMessgeRepo)
    {
        $this->oMessageRepo = $oMessgeRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //取留言板資料
        $aMessageList = $this->oMessageRepo->getMessageData();

        return view('rickytest', ['Lists' => $aMessageList]);
    }

    public function addData(Request $request, Auth $Auth)
    {

        $aAddData = array(
            'title' => $request->title,
            'context' => $request->context,
            'author' => $Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        return $aAddData;
        return $this->oMessageRepo->addMessageData($aAddData);
    }

    public function deleteData($_iDeleteID)
    {
        $this->oMessageRepo->delMessageData($_iDeleteID);
    }
}
