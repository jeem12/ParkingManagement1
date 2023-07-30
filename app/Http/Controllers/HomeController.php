<?php
namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\Out;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('login');

    } 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $user = Auth::user();
        $userRole = $user->type;



        $currentCheckInToday = Check::all()->count();
     
        $currentCheckOutToday = Out::all()->count();
   

        // <-- ================================================================================ -->

        // Get the start and end dates for the current month
        $currentMonthStartDate = Carbon::now()->startOfMonth();
        $currentMonthEndDate = Carbon::now()->endOfMonth();

        // Get the start and end dates for the previous month
        $previousMonthStartDate = Carbon::now()->subMonth()->startOfMonth();
        $previousMonthEndDate = Carbon::now()->subMonth()->endOfMonth();

        // Get the revenue for the current month
        $currentCheckouts = Out::whereBetween('checkoutdate', [$currentMonthStartDate, $currentMonthEndDate])->count();
        $currentRevenue = $currentCheckouts * 30; // Assuming the fixed rate is 30 Philippine Pesos (PHP)

        // Get the revenue for the previous month
        $previousCheckouts = Out::whereBetween('checkoutdate', [$previousMonthStartDate, $previousMonthEndDate])->count();
        $previousRevenue = $previousCheckouts * 30; // Assuming the fixed rate is 30 Philippine Pesos (PHP)

        // Calculate the percentage change in revenue
        $percentageChange = 0;

        if ($previousRevenue != 0) {
            $percentageChange = (($currentRevenue - $previousRevenue) / $previousRevenue) * 100;
        }

        // Optionally, format the revenue and percentage change for display
        $formattedCurrentRevenue = '₱' . number_format($currentRevenue, 0);
        $formattedPreviousRevenue = '₱' . number_format($previousRevenue, 0);
        $formattedPercentageChange = number_format($percentageChange, 0) . '%';

        $lastRecord = Check::latest()->first();



        return view('adminHome', compact('userRole','formattedCurrentRevenue','currentCheckInToday','currentCheckOutToday','formattedPercentageChange','lastRecord'));

    }


    public function returnCheckIn()
    {

        $user = Auth::user();
        $userRole = $user->type;
        $data = Check::orderBy('checkintime', 'desc')->get();

        return view('check_in', compact('userRole','data'));
    }

    public function returnCheckOut()
    {

        $user = Auth::user();
        $userRole = $user->type;
        $data = Out::orderBy('checkouttime', 'desc')->get();

        return view('check_out', compact('userRole','data'));
    }


    public function managerHome()
    {
        $user = Auth::user();
        
        $userRole = $user->type;

        

        $data = Check::orderBy('checkintime', 'desc')->get();
        $data1 = Out::orderBy('checkouttime', 'desc')->get();

         // Combine the two datasets into one array
        $checksData = ['checkin' => $data, 'checkout' => $data1];

    return view('managerHome', compact('userRole','checksData')); 

    }

    public function getCheck()
    {
        

    }

    public function profile()
    {
        return view('profile');
    }

    public function check()
    {
        return view('check');
    }



    public function submitForm(Request $request)
    {

        $customMessages = [
            'plate.required' => 'The Plate No. is required.',
            'plate.regex' => 'The Plate No. must have exactly 3 letters and 3 numbers and be 6 characters long.'
            // Add custom messages for other fields and rules as needed
        ];
    
        $request->validate([
            'plate' => 'required|regex:/^[a-zA-Z]{3}[0-9]{3}$/',
            // Add validation rules for other fields as needed
        ], $customMessages);


        $data = Check::create([

            'plate' => $request->input('plate'),
            'checkoutdate' => null,
            'checkouttime' => null

            
        ]);

        // If the data insertion was successful, redirect to a "success" view with a success message
    if ($data) {
        return redirect()->route('manager.home')->with('success', 'Data saved successfully!');
    }
    // If the data insertion failed, redirect back to the form with an error message
    return redirect()->back()->with('error', 'Your error message here');
    
    }

    public function checkOut(Request $id)
    {
        $checkin = Check::find($id);

        if (!$checkin) {
            return redirect()->back()->with('error', 'Check-in record not found.');
        }

        $new = new Out();

        $new->plate = $checkin[0]->plate;
        $new->checkindate = $checkin[0]->checkindate;
        $new->checkintime = $checkin[0]->checkintime;
        $new->status = 1;

        $new->save();

        Check::find($id)->firstOrFail()->delete();


        return redirect()->back()->with('success', 'Checked out successfully.');
    }

}