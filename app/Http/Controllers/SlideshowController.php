<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Image;
class SlideshowController extends Controller
{
    function listAll()
    {
        $slideshows = Slideshow::orderBy('ssorder', 'asc')->paginate(2);

        return view('admin.slideshow.index', compact('slideshows'));
    }
    function enableDisable(Request $request,String $id,String $action)
    {
        $slideshow = Slideshow::find($id);
        $slideshow->enable = ($action =='1' ? 0 : 1);
        $slideshow->save();
        $slideshows = Slideshow::orderBy('ssorder', 'asc')->paginate(2);
        
        return response()->json([
            'slideshow' => $slideshow,
            'slideshows' => $slideshows
        ]);
    }
    function moveUpDown(Request $request ,String $id, String $action)
    {
        $slideshow = Slideshow::find($id);
        $upperSlideshow = null;
        if($action == "1")
        {
            $upperSlideshow = Slideshow::where('ssorder','<', $slideshow->ssorder)->orderBy('ssorder','desc')->first();
            if($upperSlideshow != null )
            {
                $tmp = $slideshow->ssorder;
                $slideshow->ssorder = $upperSlideshow->ssorder;
                $upperSlideshow->ssorder = $tmp;
                $slideshow->save();
                $upperSlideshow->save();
            }
        }
        else
        {
            $lowerSlideshow = Slideshow::where('ssorder','>',$slideshow->ssorder)->orderBy('ssorder','asc')->first();
            if($lowerSlideshow != null)
            {
                $tmp = $slideshow->ssorder;
                $slideshow->ssorder = $lowerSlideshow->ssorder;
                $lowerSlideshow->ssorder = $tmp;
                $slideshow->save();
                $lowerSlideshow->save();
            }
        }
        return redirect()->route('admin.slideshow', ['page'=>$request->page]);
    }
    function delete(Request $request, $id)
    {
        $slideshow=Slideshow::find($id);
        if($slideshow!=null)
        {
            $slideshow->delete();
            $iname=$slideshow['img'];
            $image=public_path() . '/images/slideshows/' . $iname;
            $thumbnail=public_path() . '/images/slideshows/thumbnail/' . $iname;
            if(file_exists($image))
            {
                unlink($image);
            }
            if(file_exists($thumbnail))
            {
                unlink($thumbnail);
            }
            return redirect()->route('admin.slideshow', ['page'=>$request->page])->with("success", "A slideshow has been deleted successfully!");
        }
        else
        return redirect()->route('admin.slideshow', ['page'=>$request->page])->with("fail", "Slideshow not found!");
    }

    function form(Request $request)
    {
        return view('admin.slideshow.form');
    }
    function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'txttitle' => 'required',
            'txtsubtitle' => 'required',
            'tatext' => 'required',
            'txtlink' => 'required',
            // 'img' => 'required|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        } else {
            $slideshow = new Slideshow();
            $slideshow->title = $request->txttitle;
            $slideshow->subtitle = $request->txtsubtitle;
            $slideshow->text = $request->tatext;
            $slideshow->link = $request->txtlink;
            $slideshow->enable = $request->has('chkenable') ? "1" : "0";
            $slideshow->ssorder=Slideshow::orderBy("ssorder", "desc")->pluck("ssorder")->first()+1;

            //Name
            $ext= $request->file('fileimg')->getClientOriginalExtension();
            $iname=time() . "." . $ext;
            $pathname=public_path('images/slideshows');
            //thumbnail
            $image = Image::make($request->file('fileimg'));
            $image->resize(50,50);
            $image->save($pathname . '/thumbnail/' . $iname);

            //MOVE IMAGE
            $request->file('fileimg')->move($pathname,$iname);
            $slideshow->img=$iname;
            $slideshow->save();

            return redirect()->route('admin.slideshow', ['page'=>$request->page]);
        }
    }
    function edit($id)
    {
        $slideshow = Slideshow::find($id);

        return view('admin.slideshow.form', compact('slideshow'));
    }
    function update(Request $request)
    {
        $id = $request->txtssid;
        $slideshow = Slideshow::find($id);
        if($slideshow){
            $slideshow->title = $request->txttitle;
            $slideshow->subtitle = $request->txtsubtitle;
            $slideshow->text = $request->tatext;
            $slideshow->link = $request->txtlink;
            $slideshow->enable = 0;
            if(isset($request->chkenable)){
                $slideshow->enable = 1;
            }
            if($request->hasFile('fileimg')){
                $ext = $request->file('fileimg')->getClientOriginalExtension();
                $iname = time() . "." . $ext;
                $pathname = public_path('images/slideshows');
                //Thumbnail
                $image = Image::make($request->file('fileimg'));
                $image -> resize(50, 50);
                $image -> save($pathname . "/thumbnail/" . $iname);

                //Move image
                $request->file('fileimg')->move($pathname, $iname);

                //Delete old image
                $oimage = $slideshow->img;
                unlink($pathname . "/thumbnail/" . $oimage);
                unlink($pathname . "/" . $oimage);

                $slideshow->img = $iname;
            }
            
            $slideshow->save();
        }
        return redirect('/admins/slideshow')->with('success', 'Data is successfully updated');;
    }
    
}
