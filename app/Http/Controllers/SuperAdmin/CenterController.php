<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CenterController extends Controller
{
   public function index(){
       $centers = Center::orderBy('id', 'DESC')->get();
       return view('SuperAdmin.manageCenter.index', compact('centers'));
   }

   public function profile($id)
   {
       $center = Center::findOrFail($id);
       return view('SuperAdmin.manageCenter.profile', compact('center'));
   }

   public function activeNow($id)
   {
       $center = Center::findOrFail($id);
       $center->status = 1;
       try {
           $center->save();
           return response()->json([
               'type' => 'success',
               'message' => 'Successfully Updated'
           ]);
       } catch (\Exception $exception) {
           return response()->json([
               'type' => 'error',
               'message' => $exception->getMessage()
           ]);
       }
   }

   public function inactiveNow($id)
   {
       $center = Center::findOrFail($id);
       $center->status = 0;
       try {
           $center->save();
           return response()->json([
               'type' => 'success',
               'message' => 'Successfully Updated'
           ]);
       } catch (\Exception $exception) {
           return response()->json([
               'type' => 'error',
               'message' => $exception->getMessage()
           ]);
       }
   }

   public function deleteNow($id)
   {
       $center = Center::findOrFail($id);
       $center->deleted_at = Carbon::now();
       try {
           $center->save();
           return response()->json([
               'type' => 'success',
               'message' => 'Successfully Deleted'
           ]);
       } catch (\Exception $exception) {
           return response()->json([
               'type' => 'error',
               'message' => $exception->getMessage()
           ]);
       }
   }
}
