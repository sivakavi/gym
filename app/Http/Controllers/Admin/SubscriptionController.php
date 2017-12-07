<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subscription;
use App\Customer;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreSubscription;

class SubscriptionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subscriptions = Subscription::orderBy('id', 'desc')->paginate(10);

		return view('admin.subscriptions.index', compact('subscriptions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all();
		return view('admin.subscriptions.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(StoreSubscription $request)
	{
		$subscriptionDetails = $request->only([
			'sdate',
			'edate',
			'category_type',
			'amt'
		]);
		$subscriptionDetails['customer_id'] = Customer::where('mobilenumber', Input::get('phno'))->first()->id;
		$subscriptionDetails['bamt'] = $subscriptionDetails['amt'];
		$subscription = Subscription::create($subscriptionDetails);
		
		return redirect()->route('admin.subscriptions.index')->with('message', 'Subscription created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subscription = Subscription::findOrFail($id);

		return view('admin.subscriptions.show', compact('subscription'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subscription = Subscription::findOrFail($id);
		$customers = Customer::all(['id', 'name']);
		return view('admin.subscriptions.edit', compact('subscription', 'customers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(StoreSubscription $request, $id)
	{
		$subscription = Subscription::findOrFail($id);
		$subscriptionDetails = $request->only([
			'sdate',
			'edate',
			'category_type',
			'amt',
			'customer_id'
		]);
		$subscriptionDetails['bamt'] = $subscriptionDetails['amt'];
		Subscription::find($id)->update($subscriptionDetails);
		return redirect()->route('admin.subscriptions.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$subscription = Subscription::findOrFail($id);
		$subscription->delete();

		return redirect()->route('admin.subscriptions.index')->with('message', 'Item deleted successfully.');
	}

	public function getSubscription(Request $request)
	{
        $phno = Input::get('mobilenumber');
		$subscription = Customer::where('mobilenumber', "$phno")->first()->subscription()->orderBy('created_at', 'desc')->first();
		if($subscription){
			return response()->json(['date' => $subscription->edate]);
		}
		return response()->json(['date' => '']);
	}

}
