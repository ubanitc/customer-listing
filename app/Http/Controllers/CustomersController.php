<?php

namespace small_project\Http\Controllers;

use small_project\Http\Controllers\Controller;
use small_project\Models\Customer;
use Illuminate\Http\Request;
use Exception;

class CustomersController extends Controller
{

    /**
     * Display a listing of the customers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $customers = Customer::paginate(25);

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('customers.create');
    }

    /**
     * Store a new customer in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        

            $this->validate($request, [
                  'first_name'=>'required|regex:/^[a-zA-Z]+$/u',
                  'last_name'=>'required|regex:/^[a-zA-Z]+$/u',
                  'email'=>'required|email',
                  'phone_number'=>'required|numeric',
                  'priority'=>'required|regex:/^[1-5]$/',
        
        
                ]);
            
            $data = $request->all();
            
            Customer::create($data);

            return redirect()->route('customers.customer.index')->withInput()
                ->with('success_message', 'Customer was successfully added.');
        
    }

    /**
     * Display the specified customer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $customer = Customer::findOrFail($id);
            $customer->update($data);

            return redirect()->route('customers.customer.index')
                ->with('success_message', 'Customer was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified customer from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            return redirect()->route('customers.customer.index')
                ->with('success_message', 'Customer was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required|numeric',
            'priority' => 'required|numeric|min:-2147483648|max:2147483647', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
