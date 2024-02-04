<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room; 
use Illuminate\Support\Facades\DB; 
  
class RoomController extends Controller
{
    public function index()
    {
        $room = Room::orderBy('created_at', 'DESC')->get(); 
        return view('room.index', compact('room')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $room = Room::find($id);  
        $room->delete();  
        toastr()->success('Room deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('room.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $room = new Room();
            $room->room_no = $request->room_no;
            $room->room_type = $request->room_type;
            $room->bed_capacity = $request->bed_capacity; 
            $room->save();  
            DB::commit();
            toastr()->success('Room created successfully.');  
            return redirect('room');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $room = Room::find($id);  
        return view('room.update', compact('room'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $room = Room::find($id);   
            $room->room_no = $request->room_no;
            $room->room_type = $request->room_type;
            $room->bed_capacity = $request->bed_capacity; 
            $room->save();  
            DB::commit();
            toastr()->success('Room updated successfully.');    
            return redirect('room');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }   
}
