<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subscription;
use App\Customer;
use Illuminate\Http\Request;
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
		$customers = Customer::all(['id', 'name']);
		return view('admin.subscriptions.create', compact('customers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(StoreSubscription $request)
	{
		dd('uygsc');
		$subscriptionDetails = $request->only([
			'sdate',
			'edate',
			'category_type',
			'amt',
			'bamt',
			'customer_id'
		]);
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

		return view('admin.subscriptions.edit', compact('subscription'));
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
			'bamt',
			'customer_id'
		]);
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

}
