<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $customer;
    
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    
     public function index(Request $request)
    {
        if($request->has('search')){
            $search = $request->get('search');

            $customers = $this->customer->where('fullname', 'like', "%{$search}%")
            //->orderBy('fullname', 'DESC')->paginate(15);
            ->orWhere('phone', 'like', "%{$search}%")
            ->orWhere('cellphone', 'like', "%{$search}%")
            //->orWhere('phone', 'like', "%{$search}%")
            //->orWhere('address', 'like', "%{$search}%")
            ->paginate(10);

            $customers->appends(['search' => $search]);

            //dd($customers->appends(['search' => $search]));
            return view('admin.customers.index', compact('customers', 'search'));

        } else {
            $customers = $this->customer->where('active',1)->orderBy('id','DESC')->paginate(15);
            return view('admin.customers.index', compact('customers'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->all();

        $customer = $this->customer->create($data);
        
        flash('Cadastro Criado com Sucesso!')->success();
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->customer->findorFail($id);
        return view('admin.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $customer)
    {
  
        $data = $request->all();
        $customer = $this->customer->find($customer);
        $customer->update($data);

        flash('Cadastro atualizado com sucesso!')->success();
        return redirect()->route('customers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = $this->customer->find($id);
        $customer->delete();

        flash('Cadastro Removido com Sucesso!')->success();
        return redirect()->route('customers.index');
    }

    public function search(Request $request)
    {
        $query =  $request->query;
        $customers = $this->customer->where('fullname','LIKE','%' .$query. '%');

       dd($customers);
       return view('admin.customers.index', ['customers' => $customers]);
        
    }
}
