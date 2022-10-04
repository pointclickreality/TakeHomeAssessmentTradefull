<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// SEO
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductsController extends Controller
{

    public string $designTemplate;

    public function __construct()
    {
        $this->designTemplate = request()->design ?? 'bootstrap';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $homeSeo = HomeSeoModel::all();
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $homeLink = "http://$_SERVER[HTTP_HOST]";
        // $homeTitle = $homeSeo[0]['title'];

        // $homeShareTitle = $homeSeo[0]['share_title'];
        // $homeDescription = $homeSeo[0]['description'];
        // $homeKeywords = $homeSeo[0]['keywords'];
        // $homeImage = $homeLink."/".$homeSeo[0]['page_img'];
        $homeTitle = 'Take Home Assestment';
        $homeShareTitle = 'Take Home Assestment - BackEnd Developer - JD Hawkins';
        $homeDescription = 'This is an assestment to show my skill as a Laravel Developer';
        $homeKeywords = 'developer, assetment, livewire, laravel, mysql, php8';
        $homeImage = null;

        // <!--Google-->
        SEOMeta::setTitle($homeTitle);
        SEOMeta::setDescription($homeDescription);
        SEOMeta::setKeywords($homeKeywords);
        SEOMeta::setCanonical($actual_link);

        // <!--FaceBook-->
        OpenGraph::addImage($homeImage);
        OpenGraph::setTitle($homeTitle);
        OpenGraph::setDescription($homeDescription);
        OpenGraph::setUrl($actual_link);
        OpenGraph::setSiteName($homeShareTitle);
        $action = 'viewHome';
        $product_id = null;

        return view('dashboard.default',compact('action', 'product_id'));
    }

    /**
     * Create a new product
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function create(Request $request)
    {
        $product_id = null;
        $action = 'createProduct';
        return view('dashboard.default',compact('product_id', 'action'));
    }

    /**
     * This route in controller was skipped, the actual store function
     * can be found in the Livewire::products widget.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $product_id = $id;
        // find the product, or show 404
        $product = Product::findOrFail($id);
        $action = 'viewProduct';

        return view('dashboard.default',compact('product', 'product_id', 'action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_id = $id;
        $product = Product::findOrFail('id',$id);
        $action = 'editProduct';

        return view('dashboard.default',compact('product', 'product_id', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
