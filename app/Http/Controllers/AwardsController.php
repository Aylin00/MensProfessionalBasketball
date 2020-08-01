<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MongoDB;

class AwardsController extends Controller
{
    public function Index() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Awards;
        $award = $collection->find();
        return view('Admin.Awards.index', [ "award" => $award ]);
    }

    public function Awardstore() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Awards;
        $productCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $award = $collection->find([], [ "limit" => 64, "skip" => ($page - 1) * 12 ]);
        return view('Awards.index', [ "award" => $award, "productCount" => $productCount ]);
    }

    public function AwardsDetails($id) {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Awards;
        $award = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view("Awards.Details", ["award" => $award]);
    }

    public function Show($id) { //Details
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Awards;
        $award = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Awards.details', [ "award" => $award ]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Awards;
        $award = $collection->find();
        return view('Admin.Awards.create', [ "award" => $award ]);
    }

    public function Store() {
        $award = [
            "award" => request("award"),
            "year" => request("year"),
            "lgID" => request("lgID"),
        ];
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Awards;
        $insertOneResult = $collection->insertOne($award);
        if ($insertOneResult->getInsertedCount() == 1) 
            return redirect('/admin/awards')->with('mssg', request('award')." was added succesfuly.")->with('alerttype', "success");
            
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Awards;
        // $collectionC = (new MongoDB\Client)->FiveCStore->Categories;
        // $categories = $collectionC->find();
        $award = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Awards.edit', [ "award" => $award ] );
    }

    public function Update() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Awards;
        $award = [
            "award" => request("award"),
            "year" => request("year"),
            "lgID" => request("lgID"),
            "franchID" => request("franchID"),
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("productid"))
        ],[
            '$set' => $award
        ]);

        if($updateOneResult->getModifiedCount() == 1)
            return redirect("/admin/awards/".request("productid"))->with('mssg', "Updated succesfuly.")->with("alerttype", "success");
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Awards;
        // $collectionC = (new MongoDB\Client)->MensProfessionalBasketball->Categories;
        // $categories = $collectionC->find();
        $award = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Awards.delete', [ "award" => $award ]);
    }

    public function Remove() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Awards;
        $awardname = request('award');
        $deletOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("productid"))
        ]);

        if($deletOneResult->getDeletedCount() == 1)
            return redirect("/admin/awards")->with("mssg", $awardname." was deleted succesfuly.")->with("alerttype", "success");
    }
}