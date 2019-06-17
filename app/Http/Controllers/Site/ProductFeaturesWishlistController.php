<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\ServiceProductFeaturesWishlist;
use App\Tools\Helpers;
use App\Tools\Seo;
use Redirect;

class ProductFeaturesWishlistController extends Controller
{

    private $servicePFW;
    public function __construct(ServiceProductFeaturesWishlist $servicePFW)
    {
        $this->servicePFW = $servicePFW;
    }

    public function addAndDelete($product_id){
        return $this->sendResponse(
            $this->servicePFW->addOrDelete($product_id)
        );
    }

    public function count(){
        return $this->sendResponse(
            $this->servicePFW->count()
        );
    }

    public function wishlist(){
        $seo = Seo::pageSeo('wishlist');
        return view(Helpers::isMobile() ? 'mobile.wishlist' : 'site.wishlist', [
            'wishlist' => $this->servicePFW->list(),
            'seo' => $seo
        ]);
    }

    public function delete(int $product_id){
        if($this->servicePFW->delete($product_id))
            return Redirect::back()->with('success', 'Закладки успешно обновлены!');
        else
            return Redirect::back()->with('attention', 'Ошибка 404!');
    }

}