<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\DoctorSlot;
 
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class AppointmentController extends Controller
{
    public function generateSlots(Request $request)
{
    $doctorId = $request->doctor_id;
    $date = $request->date;
    $startHour = $request->start_hour;
    $endHour = $request->end_hour;
    $slotDuration = intval($request->slot_duration ?? 30); // conversione

    $start = Carbon::parse($startHour);
    $end = Carbon::parse($endHour);

    while ($start->lt($end)) {
        Appointment::create([
            'doctor_id' => $doctorId,
            'date' => $date,
            'start_time' => $start->format('H:i:s'),
            'end_time' => $start->copy()->addMinutes($slotDuration)->format('H:i:s'),
        ]);
        $start->addMinutes($slotDuration);
    }

    // Torna alla stessa pagina con messaggio
    return redirect()->route('admin.dottori.calendar')->with('success', 'Slot creati con successo');
}


public function calendarioDottori()
{
$doctorId = Auth::id();

    $slots = Appointment::with('paziente') // ✅ eager loading
        ->where('doctor_id', $doctorId)
        ->orderBy('date')
        ->orderBy('start_time')
        ->get();
 
    return view('admin.dottori.calendar', compact('slots'));
}


public function deletePastSlots()
{
    $today = Carbon::today();
$deleted = Appointment::where('date', '<', $today)->delete();

     // Torna alla stessa pagina con messaggio
    return redirect()->route('admin.dottori.calendar')->with('success', "$deleted slot eliminati.");    
}

}
