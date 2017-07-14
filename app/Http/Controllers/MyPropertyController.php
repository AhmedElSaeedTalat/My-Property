<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ahmedStream;
use App\Locations;
use App\MyProperty;
use App\Notifications\propertyShare;
use App\detailedPage;
use App\images;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class MyPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Project.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $x = new MyProperty;
        $y = $x->take("4")->get();
        return $y;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $x = new MyProperty;
        $y = $x->take("10")->get();
        return $y;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MyProperty  $myProperty
     * @return \Illuminate\Http\Response
     */
    public function show(MyProperty $myProperty)
    {
        $x = new MyProperty;
        $y = request("Search");
        $g = $x->search($y)->get();
        return $g;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MyProperty  $myProperty
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      $x = new MyProperty;
      $y = $x->where("type","Sale")->get();
      return $y;
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MyProperty  $myProperty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyProperty $myProperty)
    {
        $x = new MyProperty;
      $y = $x->where("type","Rent")->get();
      return $y;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MyProperty  $myProperty
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $this->validate(request(),[
              "user"=>"required",
              "password"=>"required|confirmed"
            ]);
       $user = user::create([
           "name"=>request("user"),
           "email"=>request("Email"),
           "password"=>bcrypt(request("password")),
        ]);
       auth()->login($user);
       return "done";
    }
      public function soso()
    {
        $this->validate(request(),[
               "Email"=>"required",
              "password"=>"required"
            ]);
        
       $user = auth()->attempt(["email"=>request("Email"),
         "password"=>request("password")
        ]);
       if (!$user) {
           throw new Exception("a77a");
       }
}
      public function lola()
    {
             $x = new images;
           $y = $x->where("user_id",auth()->id())->take("1")->orderBy("id","desc")->get();
        return [
        auth()->user()->name,
        auth()->user()->email,
        auth()->user()->DateOfBirth,
        auth()->id(),
        $y
                ]


        ;
    }
     public function out()
    {
        auth()->logout();
        return "done";
    }
     public function Nina(Request $request)
    {
        $x = request("file");
          $y=$x->getClientOriginalName();
        $g=  $x->storeAs("public",$y);
        images::create([
           "images"=>$y,
           "user_id"=>auth()->id()
            ]);
      return view("Project.index");
                }
    public function updateData()
    {
        $user = request("user");
        $DateOfBirth = request("DateOfBirth");
        $Email = request("Email");
        $x = new user;
        if(empty($DateOfBirth) && empty($Email)){
        $x->where("id",auth()->id())->update(["name"=>$user]);
                                                    }
    elseif(empty($user) && empty($DateOfBirth)){
        $x->where("id",auth()->id())->update(["email"=>$Email]);
                                                    }
      elseif(empty($user) && empty($Email)){
        $x->where("id",auth()->id())->update(["DateOfBirth"=>$DateOfBirth]);
                                                    }
        elseif(empty($user)){
        $x->where("id",auth()->id())->update(["DateOfBirth"=>$DateOfBirth,"email"=>$Email]);
                                                    }
        elseif(empty($Email)){
        $x->where("id",auth()->id())->update(["DateOfBirth"=>$DateOfBirth,"name"=>$user]);
                                                    }
         elseif(empty($DateOfBirth)){
        $x->where("id",auth()->id())->update(["email"=>$Email,"name"=>$user]);
                                                    }
         else{
              $x->where("id",auth()->id())->update(["email"=>$Email,"name"=>$user,"DateOfBirth"=>$DateOfBirth]);
         }

    } 
      public function Locations()
    {
        $x = new Locations;
        $y = $x->all();
        return $y;
    }
     public function clicked()
    {
        $x = new MyProperty;
        $y = $x->with("Desc")->where("id",request("id"))->get();
        return $y;
    }
      public function share()
    {
        $x = new MyProperty;
        $house=request("house");
        $x->where("id",request("id"))->update(["user_id"=>request("user")]);
        auth()->user()->notify(new propertyShare($house));
        $c="";
        $g = DB::table('notifications')->where("notifiable_id",auth()->id())->take("1")->get();
        
        return $g;
    }
      public function Notifications()
    {
       
   $y=  DB::table('notifications')->where("notifiable_id",auth()->id())->get();
       return $y;
    }
      public function experience()
    {
       
        $g = DB::table('notifications')->where("notifiable_id",auth()->id())->take("1")->get();

        return $g;
    }

    private function streamFile( $contentType, $path ) {
        $fullsize = filesize($path);
        $size = $fullsize;
        $stream = fopen($path, "r");
        $response_code = 200;
        $headers = array("Content-type" => $contentType);
        
        // Check for request for part of the stream
        $range = Request()->header('Range');
        if($range != null) {
            $eqPos = strpos($range, "=");
            $toPos = strpos($range, "-");
            $unit = substr($range, 0, $eqPos);
            $start = intval(substr($range, $eqPos+1, $toPos));
            $success = fseek($stream, $start);
            if($success == 0) {
                $size = $fullsize - $start;
                $response_code = 206;
                $headers["Accept-Ranges"] = $unit;
                $headers["Content-Range"] = $unit . " " . $start . "-" . ($fullsize-1) . "/" . $fullsize;
            }
        }
        
        $headers["Content-Length"] = $size;

        return Response()->stream(function () use ($stream) {
            fpassthru($stream);
        }, $response_code, $headers);
    }


      public function videos()
    {
       
      $path_to_file="videos/property.mp4";
       $plzWork = $this->streamFile("video/mp4",  $path_to_file);
return $plzWork;
    
     }
        public function tryMaps()
    {
       
     return view("sex");
    
     }
}
