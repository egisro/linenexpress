<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Session;
class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }
     public function sendemail(Request $request){
       $this->validate($request, [
        	'fname'	=>	'min:2',
        	'email'	=>	'required|email',
        	'phone' =>	'min:10',
        	'subject'=>	'min:3',
        	'message'=>	'min:10']);
        $data = array(
        	'fname' => $request->fname,
        	'email' => $request->email,
        	'phone' => $request->phone,
        	'subject' => $request->subject,
        	'bodyMessage' => $request->message
        	 );
        Mail::send('emails.contactview', $data, function($message) use($data) {
        	$message->from('info@linenexpress.ie');
        	$message->to('egidijus.rolius@gmail.com');
        	$message->subject($data['subject']);
        });
        	$notification = array(
			'message' => 'Your Message was Sent. Thank You for Contacting Us!', 
			'alert-type' => 'success');
		return redirect()-> back()->with($notification);
    }
}
 /* Session::flash('success', 'THANK YOU! Your Message was Sent.');
        return redirect()-> back();
	with('flash_message_success', 'Your Message was Sent. Thank You for Contacting Us!');
	->toastr()->success('THANK YOU!', 'Your Message was Sent.')Session::flash('success', 'THANK YOU!' 'Your Message was Sent.');
*/