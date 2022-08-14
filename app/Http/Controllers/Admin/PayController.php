<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Comment;
use App\Message;
use App\Pay;
use Auth;
use Hash;
use Toastr;

class PayController extends Controller
{
    public function index()
    {   
        $pays = Pay::all();

        return view('admin.pays.index',compact('pays'));
    }

    public function edit($id)
    {
        $pays = Pay::find($id);

        return view('admin.pays.edit', compact('pays'));
    }
    
    public function create()
    {   
        $pays = Pays::all();

        return view('admin.properties.create',compact('pays'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required',
            'fecha_pago'   => 'required',
            'amount'       => 'required',
            'impago'       => 'required'
        ]);
        
        $pay = new Pay();
        $pay->agent_id = $id;
        $pay->name = $request->name;
        $pay->fecha_pago = $request->fecha_pago;
        $pay->amount = $request->amount;
        $pay->impago = $request->impago;

        $pay->save();
        
        Toastr::success('message', 'Pago registrado exitosamente.');
        return redirect()->route('admin.users.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required',
            'fecha_pago'   => 'required',
            'amount'       => 'required',
            'impago'       => 'required'
        ]);
        
        $pay = new Pay();
        $pay->agent_id = $id;
        $pay->name = $request->name;
        $pay->fecha_pago = $request->fecha_pago;
        $pay->amount = $request->amount;
        $pay->impago = $request->impago;

        $pay->save();
        
        Toastr::success('message', 'Pago modificado exitosamente.');
        return redirect()->route('admin.pays.index');
    }



    public function destroy($id)
    {
        $pay = Pay::findOrFail($id);
        $pay->delete();

        Toastr::success('message', 'Pago eliminado exitosamente.');
        return redirect()->route('admin.pays.index');
    }

}