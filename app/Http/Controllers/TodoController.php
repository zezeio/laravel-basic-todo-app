<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todolar;
class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $todolar = Todolar::where('kullaniciID', Auth::id())->get();
        return view('todo.index', compact('todolar'));
    }
 
    public function ekle(Request $request)
    {
        $todo = new Todolar();
        $todo->baslik = $request->baslik;
        $todo->durum = $request->durum;
        $todo->kullaniciID = Auth::id();
        $todo->save();

        return redirect()->route('menu')->with('success', 'Todo Eklendi');
    }

    public function guncelle(Request $request, $todoID)
    { 
        $todo = Todolar::findOrFail($todoID);
        if($todo->kullaniciID != Auth::id())
        {
            return redirect()->back()->with('error', 'Sadece kendi verini değiştirebilirsin.');
        }

        if($todo->durum == 0)
        {
            $todo->durum = 1;
            $todo->save();
        }
        else if($todo->durum == 1)
        {
            $todo->durum = 0; 
            $todo->save();
        }
        else 
        {
            return redirect()->route('menu')->with('error', 'Sistemsel bir hata oluştu'); 
        } 

        return redirect()->route('menu')->with('success', 'Todo Güncellendi'); 
    }

    public function sil(Request $request, $todoID)
    {
        $todo = Todolar::findOrFail($todoID);
        if($todo->kullaniciID != Auth::id())
        {
            return redirect()->back()->with('error', 'Sadece kendi verini silebilirsin.');
        }

        $todo->delete();

        return redirect()->route('menu')->with('success', 'Todo Silindi'); 
    }
}
