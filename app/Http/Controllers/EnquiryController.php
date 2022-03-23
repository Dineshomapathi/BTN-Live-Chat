<?php  

namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Enquiry; 
use RealRashid\SweetAlert\Facades\Alert;

class EnquiryController extends Controller { 

      public function getContact() { 

       return view('contactus'); 
     } 

      public function saveContact(Request $request) { 

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
        ]);

        $enquiry = new Enquiry;

        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone_number = $request->phone_number;

        $enquiry->save();
        
        Alert::success('Thank you for contact us!');
        return back();

    }
}