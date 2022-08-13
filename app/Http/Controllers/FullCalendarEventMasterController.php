<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FullCalendarEventMasterController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {

         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

         $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return Response::json($data);
        }

        $data = Event::all();
        return view('fullcalendar', compact('data'));
    }

    public function create(Request $request)
    {
        $insertArr = [
            'title' => $request->title,
            'start' => $request->start,
            'end'   => $request->end
        ];
        // dd($insertArr);
        $event = Event::create($insertArr);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);

        return Response::json($event);
    }

    public function destroy(Request $request)
    {
        $event = Event::where('id', $request->id)->delete();
        // dd($event);

        return redirect()->back();
    }
}
