<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EmployeCongeMail;
use App\Notifications\CongeStatusNotification;
use Illuminate\Http\Request;
use App\Models\Conge;
use Illuminate\Support\Facades\Mail;

class CongeController extends Controller
{
    public function index()
    {
        $conges = Conge::with('user')->get();

        return view('admin.conges.index', compact('conges'));
    }
    public function refuser($id)
    {
        $conge = Conge::with('user')->findOrFail($id);
        if(!$conge){
            return redirect()->back()->with('error', 'Congé introuvable');
        }
        
        $conge->update(['statut' => 'Refuser']);
        $conge->user->notify(new CongeStatusNotification($conge));
        Mail::queue(new EmployeCongeMail($conge->user,$conge->statut, $conge->remarque ?? 'no remarque sent by admin', 'http://127.0.0.1:8000/employe/conges'));

        return redirect()->back()->with('success', 'Congé refus avec sucees');
    }
    public function accepter($id)
    {
    // البحث عن الطلب
    $conge = Conge::findOrFail($id);

    // تحديث الحالة إلى "Approuvé"
    $conge->update([
        'statut' => 'Approuve'
    ]);
    $conge->user->notify(new CongeStatusNotification($conge));

    // رسالة نجاح وإعادة التوجيه
    return redirect()->route('admin.conges.index')->with('success', 'تم قبول الطلب بنجاح!');
    }



}
