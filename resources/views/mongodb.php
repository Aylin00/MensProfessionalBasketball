<?php
// $collection = (new MongoDB\Client)->Basketball->Players;
//         $comment = [
//             "user_id" => "5ee224c74250884f6c89c94e",
//             "comment" => "Works good enough.",
//             "date" => date("Y-m-d H:i:s")
//         ];
//         $product = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId("5ee227ef4250884f6c89c950") ]);
//         $comments = $product->comments;
//         if (count($comments) == 0 || $comments == null || empty($comments)) {
//             $comments = [$comment];
//         } else {
//             $comments = [$comment, ...$comments];
//         }
//         $updateOneResult = $collection->updateOne([
//             "_id" => new MongoDB\BSON\ObjectId("5ee227ef4250884f6c89c950")
//         ],[
//             '$set' => [ "comments" => $comments ]
//         ]);

//         $product = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId("5ee227ef4250884f6c89c950") ]);
//         print_r($product->comments);

$collection = (new MongoDB\Client)->MensProfessionalBasketball->Players;

$cursor = $collection->find(
    [],
    [
        'limit' => 5,
        'sort' => ['pop' => -1],
    ]
);
// var_dump($cursor);
// print_r($cursor);
foreach ($cursor as $document) {
    print_r($document);
}