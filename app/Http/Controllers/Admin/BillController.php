<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Subscription;
use App\Bill;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomer;
use Illuminate\Support\Facades\Input;


class BillController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bills = Bill::orderBy('id', 'desc')->paginate(10);

		return view('admin.bills.index', compact('bills'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.bills.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{

		$billDetails = $request->only([
			'subscription_id',
			'amt_paid',
		]);
		$subscription = Subscription::find($billDetails['subscription_id']);
		$subscription->bamt = $subscription->bamt - $billDetails['amt_paid'];
		$subscription->save();
		$customer = Bill::create($billDetails);
		
		return redirect()->route('admin.bills.index')->with('message', 'Bill created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bill = Bill::findOrFail($id);

		return view('admin.bills.show', compact('bill'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$customer = Bill::findOrFail($id);
		$customer->delete();

		return redirect()->route('admin.bills.index')->with('message', 'Item deleted successfully.');
	}

	public function getPhno()
	{
		$phno = Input::get('term');
		$customers = Customer::where('mobilenumber', 'LIKE', "$phno%")->select('mobilenumber')->get()->toArray();
		$mobilenumbers[] = "";
		foreach ($customers as $key => $value) {
			$mobilenumbers[] = $value['mobilenumber'];
		}
		return \Response::json($mobilenumbers);
	}

	public function getSubscription(Request $request)
	{
        $phno = Input::get('mobilenumber');
        $subscriptions = Customer::where('mobilenumber', "$phno")->first()->subscription()->where('bamt','>',0)->get();
        $data = array();
        foreach ($subscriptions as $subscription) {
            $data[$subscription->id] = $subscription->sdate.' to '.$subscription->edate.' => Balance Amount : '.$subscription->bamt;
        }
		return response()->json($data);
    }

}
