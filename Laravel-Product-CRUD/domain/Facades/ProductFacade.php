<?php

namespace domain\Facades;
use Illuminate\Support\Facades\Facade;
use domain\Services\ProductService;

class ProductFacade extends Facade{

    protected static function getFacadeAccessor(){

        return ProductService::class;
    }
}
