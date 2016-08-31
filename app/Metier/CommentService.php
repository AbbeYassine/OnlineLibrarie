<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 17/05/2016
 * Time: 16:10
 */

namespace App\Metier;


use App\Models\Commentaire;
use Illuminate\Support\Facades\DB;

class CommentService
{

    public function getCommentsByLivre($livreId)
    {
        return Commentaire::join("client", "client.client_id", "=", "commentaire.client_id")
            ->where("livre_id", "=", $livreId)
            ->select(DB::raw("CONCAT(client.first_name,' ',client.last_name) as user , client.avatar as avatar , commentaire_id , content ,rating"))
            ->get();
    }

    public function addComment($all, $userID, $livreID)
    {
        $comment = new Commentaire();
        $comment->content = $all["content"];
        $comment->rating = $all["nv_comment"];
        $comment->client_id = $userID;
        $comment->livre_id = $livreID;
        $comment->save();
    }
}