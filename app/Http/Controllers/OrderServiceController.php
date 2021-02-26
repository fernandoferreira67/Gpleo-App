<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderServiceRequest;
use App\OrderService;
use App\Customer;
use App\User;
use PDF;

class OrderServiceController extends Controller
{

    private $orderService;
    private $customer;
    private $user;

    public function __construct(OrderService $orderService, Customer $customer, User $user)
    {
        $this->orderService = $orderService;
        $this->customer = $customer;
        $this->user = $user;
    }
   
    public function index(Request $request)
    {
        if($request->has('search')){
            $search = $request->get('search');

         
            //$orderServices = $this->orderService->customer()->where('fullname', 'like', "%{$search}%")

            $orderServices = OrderService::select('order_services.*')
                ->join('customers','customers.id','=','order_services.customer_id')
                ->where(function($query) use($search){
                    $query->where('order_services.id','=',"{$search}")
                        ->orWhere('customers.fullname','like',"%{$search}%");
                })
                ->where('order_services.status','>=','1')
                //->toSql();
                ->paginate(10);

                //dd($orderServices);

          
            //$orderServices = $this->orderService->Where('id', 'like', "%{$search}%")
            //->orWhere('phone', 'like', "%{$search}%")
            //->paginate(10);
            //dd($orderServices);

            //$orderServices->appends(['search' => $search]);
            return view('admin.orderservices.index', compact('orderServices'));

       
        }else{
            $orderServices = $this->orderService->where('status','>=',2)->orderBy('id','DESC')->paginate(10);
            //$orderServices = $this->orderService->paginate(10);
            //$orderServices = $this->orderService->with('customer')->get();
            //dd($orderServices);
            return view('admin.orderservices.index', compact('orderServices'));
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = $this->customer->all();
        return view('admin.orderservices.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderServiceRequest $request)
    {
        $data = $request->all();

        $orderService = $this->orderService->create($data);

        flash('Orden de serviço aberta com sucesso')->success();
        return redirect()->route('os.index');

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
        $os = $this->orderService->findorFail($id);

        //dd($os);
        return view('admin.orderservices.edit', compact('os'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderServiceRequest $request, $orderService)
    {
        $data = $request->all();
        $orderService = $this->orderService->find($orderService);

        $data['price'] = formatPriceToDatabase($data['price']);
        
        //dd($data['price']);
        if($data['status'] == 1){

            $id = $data['id'];
            
            $data['finished_user_id'] = auth()->user()->id;
            $orderService->update($data);

            flash('Orden de Serviço finalizada com sucesso!')->success();
            return redirect()->route('os.generatePrint', compact('id'));
            
        };

        $orderService->update($data);
        
        flash('Orden de Serviço atualizada com sucesso!')->success();
        return redirect()->route('os.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderService = $this->orderService->find($id);
      
        $data['status'] = 0;
        $data['finished_user_id'] = auth()->user()->id;
       
        $orderService->update($data);

        flash('Orden de Serviço cancelada com sucesso!')->success();
        return redirect()->route('os.index');
         
    }

    public function generatePDF($id)
    {
        $os = $this->orderService->find($id);
        $pdf = PDF::loadView('reports.orders', compact('os'));
        return $pdf->setPaper('a4')->stream('orden_de_servico.pdf');
        //dd($os);

    }

    public function generatePrint($id)
    {
        $os = $this->orderService->find($id);
        return view('reports.orders', compact('os'));
        //dd($os);

    }

    public function generatePrintFinished($id)
    {
        $os = $this->orderService->find($id);
        return view('reports.orderfinished', compact('os'));
    }

    public function searchCustom($status)
    {
            $orderServices = $this->orderService->Where('status', '=', "{$status}")->paginate(10);
            return view('admin.orderservices.index', compact('orderServices'));
    }
}
