<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Http\Requests\OfferRequest;
use Illuminate\Http\Request;
use App\Traits\OfferTrait;

use Illuminate\Support\Facades\Validator;

use LaravelLocalization;

class CrudController extends Controller
{
    use OfferTrait;

    public function __construct()
    {
       
    }

    public function getOffers()
    {
        return Offer::select('id','name') ->get();

    }

    /*public function store()
    {
        Offer::create([

            'name' => 'Offer3',
            'price' => '5000',
            'details' => 'Offer details',
        ]);
    }
*/
    public function create()
    {
        return view('offers.create');

    }

   public function store(OfferRequest $request)
   {
        
    
    
    
    //return $request;
    
    //validate data before insert to database

      //  $rules= $this -> getRules();
       // $messages= $this -> getMessages();
       // $validator= Validator::make($request ->all(),$rules, $messages);

      //  if($validator ->fails())
      //  {
      //      return redirect()->back() ->withErrors($validator)->withInputs($request ->all());
      //  }
        
      
      $file_name = $this->saveImage($request->photo,'images/offers');
        




    //insert 

        Offer::create([

            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' =>   $request->name_en,
            'price' =>  $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,

        ]);

       // return 'saved successfaly';

       return redirect()->back() ->with(['success' =>'تم اضافة العرض بنجاح']);
       
   }

 /*  protected function getMessages(){

        return $messages=[

            'name.required' =>__( 'messages.offer name required'),
            'name.unique' => __('messages.offer name must be unique'),
            'price.numeric' => __('messages.price must be numeric'),
            'price.required' => __('messages.price is required'),
            'details.required' => __('messages.details is required'),
        ];
   }


   protected function getRules(){

    return $rules =[

        'name' => 'required|max:100|unique:offers,name',
        'price' =>'required|numeric',
        'details' => 'required' ,

    ];


   }

   */

  public function getAllOffers(){

   // $offers = Offer::select('id','name_ar','name_en','price','details_ar','details_en')->get(); /*return collection of all result*/

     $offers = Offer::select('id',
            'price',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details'
        )->get(); // return collection of all result


    return view('offers.all', compact('offers'));
    
  }

  public function editOffer($offer_id)
    {
        // Offer::findOrFail($offer_id);
        $offer = Offer::find($offer_id);  // search in given table id only
        if (!$offer)
            return redirect()->back(); // if id does not existe back 

        $offer = Offer::select('id', 'name_ar', 'name_en', 'details_ar', 'details_en', 'price')->find($offer_id);

        return view('offers.edit', compact('offer'));

    }

    public function UpdateOffer(OfferRequest $request, $offer_id)
    {
        //validation 

        // chek if offer exists

        $offer = Offer::find($offer_id);
        if (!$offer)
            return redirect()->back();

        //update data

        $offer->update($request->all());

        return redirect()->back()->with(['success' => ' تم التحديث بنجاح ']);

        /*  $offer->update([
              'name_ar' => $request->name_ar,
              'name_en' => $request->name_en,
              'price' => $request->price,
          ]);*/

    }

   

}
