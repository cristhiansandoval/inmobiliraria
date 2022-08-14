<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App\Property;
use App\Service;
use App\Slider;
use App\Search;
use App\Post;
use App\User;
use Auth;
use Toastr;

class FrontpageController extends Controller
{
    
    public function index()
    {
        $sliders        = Slider::latest()->get();
        $properties     = Property::latest()->where('featured',1)->with('rating')->withCount('comments')->take(6)->get();
        $services       = Service::orderBy('service_order')->get();
        $testimonials   = Testimonial::latest()->get();
        $posts          = Post::latest()->where('status',1)->take(6)->get();

        return view('frontend.index', compact('sliders','properties','services','testimonials','posts'));
    }


    public function search(Request $request)
    {
        $city     = strtolower($request->city);
        $type     = $request->type;
        $purpose  = $request->purpose;
        $bedroom  = $request->bedroom;
        $bathroom = $request->bathroom;
        $minprice = $request->minprice;
        $maxprice = $request->maxprice;
        $minarea  = $request->minarea;
        $maxarea  = $request->maxarea;
        $featured = $request->featured;

        $properties = Property::latest()->withCount('comments')
                                ->when($city, function ($query, $city) {
                                    return $query->where('city', '=', $city);
                                })
                                ->when($type, function ($query, $type) {
                                    return $query->where('type', '=', $type);
                                })
                                ->when($purpose, function ($query, $purpose) {
                                    return $query->where('purpose', '=', $purpose);
                                })
                                ->when($bedroom, function ($query, $bedroom) {
                                    return $query->where('bedroom', '=', $bedroom);
                                })
                                ->when($bathroom, function ($query, $bathroom) {
                                    return $query->where('bathroom', '=', $bathroom);
                                })
                                ->when($minprice, function ($query, $minprice) {
                                    return $query->where('price', '>=', $minprice);
                                })
                                ->when($maxprice, function ($query, $maxprice) {
                                    return $query->where('price', '<=', $maxprice);
                                })
                                ->when($minarea, function ($query, $minarea) {
                                    return $query->where('area', '>=', $minarea);
                                })
                                ->when($maxarea, function ($query, $maxarea) {
                                    return $query->where('area', '<=', $maxarea);
                                })
                                ->when($featured, function ($query, $featured) {
                                    return $query->where('featured', '=', 1);
                                })
                                ->paginate(10); 

        
        if(!isset($request->mail) && !(Auth::id())){
            Toastr::success('', 'Si ingresa correo podemos avisar sobre su busqueda.');
            return view('pages.search', compact('properties'));
        }else{
            $search = new Search();
            $search->price    = $request->maxprice;
            $search->purpose  = $request->purpose;
            $search->type     = $request->type;
            $search->bedroom  = $request->bedroom;
            $search->city     = $request->city;
            if (Auth::id()){
                $search->agent_id = Auth::id();
            }
            $search->mail     = $request->mail;
            $search->save();
            return view('pages.search', compact('properties'));
        }
    }
    public function agentsearch(Request $request)
    {
        if (isset ($request->agent)) {
            $agents = User::where('name', 'like', $request->agent)->paginate(12);
        } else {
            $agents = User::latest()->where('role_id', 2)->paginate(12);
        }

        return view('pages.agentsearch.index', compact('agents'));
    }
}
