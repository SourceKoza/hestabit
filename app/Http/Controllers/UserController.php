<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use Carbon\Carbon;
use DB;
class UserController extends Controller
{
    
    public function getUserData()
    {

       $users = User::has('getimage')->paginate(1);
       return view('home', compact('teams', 'users'));

    }

    public function saveData()
    {
        $users = [

            [
                "user" => [
                    "name" => "xyz",
                    "email" => "werwr@a.com"
                ],
                "images" => [
                    "image-1-url",
                    "image-2-url",
                    "image-3-url",

                ]
            ],
            [
                "user" => [
                    "name" => "abc",
                    "email" => "fdf@x.com"
                ],
                "images" => [
                    "image-1-url",
                    "image-2-url"

                ]
            ]
                ];

        DB::enableQueryLog();
        $userarray=[];
        $image_user=[];
        $userid=User::orderBy('id','desc')->first();
        if($userid==null)
             {
                 $userid=1;
             }
             else
             {
                 $userid=(int)$userid->id;
             }

         foreach($users as $userkey=>$user)
         {


             $userarray[$userkey]['name']=$user['user']['name'];
             $userarray[$userkey]['email']=$user['user']['name'];
             $userarray[$userkey]['password']=$user['user']['name'];
             $userarray[$userkey]['created_at']=Carbon::now();
             $userarray[$userkey]['updated_at']=Carbon::now();
             $userid=1+$userid;
             $imagearray=[];
             $imageid=[];

             $lastid=Image::orderBy('id','desc')->first();
             if($lastid==null)
             {
                 $lid=0;
             }
             else
             {
                 $lid=(int)$lastid->id;
             }

                 foreach($user['images'] as $key=>$userimage)
                     {
                         $imagearray[$key]['name']=$userimage;
                         $imagearray[$key]['url']="sss";
                         array_push($imageid,++$lid);
                         $image_user[$userid][$key]['user_id']=$userid;
                         $image_user[$userid][$key]['image_id']=++$lid;
                     }

                   //  Image::insert($imagearray);

         }
         dd($image_user);
        User:insert($userarray);

         $log = DB::getQueryLog();
         dump($log);
       // $product->multiimage()->insert($data);


     dd("done"); 

    }

}
