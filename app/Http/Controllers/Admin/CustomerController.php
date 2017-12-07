<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomer;

class CustomerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = Customer::orderBy('id', 'desc')->paginate(10);

		return view('admin.customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.customers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(StoreCustomer $request)
	{
		$customerDetails = $request->only([
			'name',
			'dob',
			'mobilenumber', 
			'doj',
			'address',
			'email'
		]);
		$customerDetails['photo'] = "";
		if ($request->hasFile('photo')) {
			$customerDetails['photo'] 	= $this->fileUpload($request->only('photo'), 'photo');
		}
		$customer = Customer::create($customerDetails);
		
		return redirect()->route('admin.customers.index')->with('message', 'Customer created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer = Customer::findOrFail($id);

		return view('admin.customers.show', compact('customer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer = Customer::findOrFail($id);

		return view('admin.customers.edit', compact('customer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(StoreCustomer $request, $id)
	{
		$customer = Customer::findOrFail($id);
		$customerDetails = $request->only([
			'name',
			'dob',
			'mobilenumber', 
			'doj',
			'address',
			'email'
		]);
		$customerDetails['photo'] = $customer->photo;
		if ($request->hasFile('photo')) {
			$customerDetails['photo'] 	= $this->fileUpload($request->only('photo'), 'photo');
		}
		Customer::find($id)->update($customerDetails);
		return redirect()->route('admin.customers.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$customer = Customer::findOrFail($id);
		$customer->delete();

		return redirect()->route('admin.customers.index')->with('message', 'Item deleted successfully.');
	}

	private function fileUpload($file, $fileVarName)
    {
        $destinationPath = public_path(). '/uploads/';
        $fileExtenstion = \File::extension($file[$fileVarName]->getClientOriginalName());
        $filename = strtotime("now").".".$fileExtenstion;
        $file[$fileVarName]->move($destinationPath, $filename);
        return $filename;
    }

}
