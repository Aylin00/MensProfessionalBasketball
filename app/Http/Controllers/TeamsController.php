<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MongoDB;

class TeamsController extends Controller
{
    public function Index() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Teams;
        $team = $collection->find();
        return view('Admin.Teams.index', [ "team" => $team ]);
    }

    public function TeamsStore() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Teams;
        $productCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $team = $collection->find([], [ "limit" => 64, "skip" => ($page - 1) * 12 ]);
        return view('Teams.index', [ "team" => $team, "productCount" => $productCount ]);
    }

    public function TeamsDetails($id) {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Teams;
        $team = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view("Teams.Details", ["team" => $team]);
    }

    public function Show($id) { //Details
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Teams;
        $team = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Teams.details', [ "team" => $team ]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Teams;
        $team = $collection->find();
        return view('Admin.Teams.create', [ "team" => $team ]);
    }

    public function Store() {
        $team = [
            "name" => request("name"),
            "year" => request("year"),
            "lgID" => request("lgID"),
            "franchID" => request("franchID"),
            "rank" => request("rank"),
        ];
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Teams;
        $insertOneResult = $collection->insertOne($team);
        if ($insertOneResult->getInsertedCount() == 1) 
            return redirect('/admin/teams')->with('mssg', request('name')." was added succesfuly.")->with('alerttype', "success");
            
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Teams;
        // $collectionC = (new MongoDB\Client)->FiveCStore->Categories;
        // $categories = $collectionC->find();
        $team = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Teams.edit', [ "team" => $team ] );
    }

    public function Update() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Teams;
        $team = [
            "name" => request("name"),
            "year" => request("year"),
            "lgID" => request("lgID"),
            "franchID" => request("franchID"),
            "rank" => request("rank"),
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("productid"))
        ],[
            '$set' => $team
        ]);

        if($updateOneResult->getModifiedCount() == 1)
            return redirect("/admin/teams/".request("productid"))->with('mssg', "Updated succesfuly.")->with("alerttype", "success");
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Teams;
        // $collectionC = (new MongoDB\Client)->MensProfessionalBasketball->Categories;
        // $categories = $collectionC->find();
        $team = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Teams.delete', [ "team" => $team ]);
    }

    public function Remove() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Teams;
        $teamname = request('name');
        $deletOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("productid"))
        ]);

        if($deletOneResult->getDeletedCount() == 1)
            return redirect("/admin/teams")->with("mssg", $teamname." was deleted succesfuly.")->with("alerttype", "success");
    }
}