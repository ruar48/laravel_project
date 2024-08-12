<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Twilio\Rest\Client;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'full_name' => 'required|string|max:255',
            'number' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);
    
        // Generate a 6-digit OTP
        $otp = rand(100000, 999999);
    
        // Store user data and OTP temporarily
        Cache::put('registration_' . $otp, [
            'full_name' => $request->full_name,
            'number' => $request->number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ], now()->addMinutes(10)); // OTP valid for 10 minutes
    
        // Send the OTP email
        Mail::to($request->email)->send(new OtpMail($otp));
    
        // Redirect to the OTP verification page
        return redirect()->route('verifyotp')->with('otp', $otp);
    }


    public function verifyOtp(Request $request)
    {
        // Validate the OTP input
        $request->validate([
            'otp' => 'required|numeric',
        ]);
    
        $otp = $request->input('otp');
    
        // Retrieve user data from the cache
        $userData = Cache::get('registration_' . $otp);
    
        if (!$userData) {
            return redirect()->route('verifyotp')->withErrors(['msg' => 'Invalid or expired OTP.']);
        }
    
        // Update the cache with email_verified_at
     
        // Send SMS OTP via Twilio
        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        $smsOtp = rand(100000, 999999); // Generate a new 6-digit OTP

        Cache::put('sms_otp_' . $smsOtp, $userData, now()->addMinutes(10)); // OTP valid for 10 minutes
    
        // Save SMS OTP to the cache with a new key
        Cache::put('registration_' . $otp. $smsOtp, [ 
            'full_name' => $request->full_name,
            'number' => $request->number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ], now()->addMinutes(10)); // OTP valid for 10 minutes
        Cache::forget('registration_' . $otp);

        try {
            $twilio->messages->create(
                $userData['number'], // To
                [
                    'from' => config('services.twilio.number'), // From
                    'body' => "Your OTP code is: $smsOtp"
                ]
            );
        } catch (\Exception $e) {
            \Log::error('Twilio SMS send failed: ' . $e->getMessage());
            return redirect()->route('verifyotp')->withErrors(['msg' => 'Failed to send SMS.']);
        }
        
    
        // Redirect to SMS verification page
        return redirect()->route('verifySms')->with('smsOtp', $smsOtp);

    }

    public function showSmsForm()
    {
        // Display SMS verification form
        return view('verifySms');
    }

    public function verifySms(Request $request)
    {
        // Validate the SMS OTP input
        $request->validate([
            'sms_otp' => 'required|numeric',
        ]);

        $smsOtp = $request->input('sms_otp');

        // Retrieve user data from the cache
        $userData = Cache::get('sms_otp_' . $smsOtp);

        if (!$userData) {
            return redirect()->route('verifySms')->withErrors(['msg' => 'Invalid or expired SMS OTP.']);
        }
    

        // Insert user data into the database
        User::create($userData);


        // Optionally, remove the cache
        Cache::forget('sms_otp_' . $smsOtp);

        // Redirect or respond with success
        return redirect()->route('login')->with('success', 'Verification successful!');
    }

    public function showlogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the login form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            // Redirect based on the user's role
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {
            return redirect()->route('login')->withErrors(['msg' => 'Invalid email or password.']);
        }
    }
    
    


    public function logout()
    {
        // Logout the user
        Auth::logout();

        // Redirect to the login page
        return redirect()->route('login');
    }

}
