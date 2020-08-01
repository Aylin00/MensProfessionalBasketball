<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MongoDB;

class PlayerController extends Controller
{
    public function Index() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        $player = $collection->find();
        return view('Admin.Players.index', [ "player" => $player ]);
    }

    public function PlayersStore() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        $productCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $player = $collection->find([], [ "limit" => 64, "skip" => ($page - 1) * 12 ]);
        return view('Players.index', [ "player" => $player, "productCount" => $productCount ]);
    }

    public function PlayersDetails($id) {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        $player = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId($id) ]);
        return view("Players.Details", ["player" => $player]);
    }

    public function Show($id) { //Details
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        $player = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Players.details', [ "player" => $player ]);
    }

    public function Create() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        $player = $collection->find();
        return view('Admin.Players.create', [ "player" => $player ]);
    }

    public function Store() {
        $player = [
            "first_name" => request("first_name"),
            "last_name" => request("last_name"),
            "conference" => request("conference"),
            "price" => request("price"),
            "games_played" => request("games_played"),
            "minutes" => request("minutes"),
            "points" => request("points"),
        ];
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        $insertOneResult = $collection->insertOne($player);
        if ($insertOneResult->getInsertedCount() == 1) 
            return redirect('/admin/players')->with('mssg', request('first_name')." was added succesfuly.")->with('alerttype', "success");
            
    }

    public function Edit($id) {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        // $collectionC = (new MongoDB\Client)->FiveCStore->Categories;
        // $categories = $collectionC->find();
        $player = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Players.edit', [ "player" => $player ] );
    }

    public function Update() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        $player = [
            "first_name" => request("first_name"),
            "last_name" => request("last_name"),
            "conference" => request("conference"),
            "price" => request("price"),
            "games_played" => request("games_played"),
            "minutes" => request("minutes"),
            "points" => request("points"),
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("productid"))
        ],[
            '$set' => $player
        ]);

        if($updateOneResult->getModifiedCount() == 1)
            return redirect("/admin/players/".request("productid"))->with('mssg', "Updated succesfuly.")->with("alerttype", "success");
    }

    public function Delete($id) {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        // $collectionC = (new MongoDB\Client)->MensProfessionalBasketball->Categories;
        // $categories = $collectionC->find();
        $player = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
        return view('Admin.Players.delete', [ "player" => $player ]);
    }

    public function Remove() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        $playername = request('first_name');
        $deletOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("productid"))
        ]);

        if($deletOneResult->getDeletedCount() == 1)
            return redirect("/admin/players")->with("mssg", $playername." was deleted succesfuly.")->with("alerttype", "success");
    }

    public function AddComment() {
        $collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;
        $comment = [
            "user_id" => request('userid'),
            "comment" => request('comment'),
            "date" => date("Y-m-d H:i:s")
        ];
        $product = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('productid')) ]);
        $comments = $product->comments;
        if (count($comments) == 0 || $comments == null || empty($comments)) {
            $comments = [$comment];
        } else {
            $comments = [$comment, ...$comments];
        }
        $updateOneResult = $collection->updateOne([
            "_id" => new MongoDB\BSON\ObjectId(request('productid'))
        ],[
            '$set' => [ "comments" => $comments ]
        ]);

        return redirect("/players/".request('productid'));
    }
}