<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    // index
    public function index()
    {
        $all = User::where('type','customer')->get();
        return view('dashboard.pages.users.index',compact('all'));
    }

    public function change_status($id)
    {
        $user =  User::findOrFail($id);
        if ($user->status == 'active') {
            $status = 'deactive';
        }else{
            $status = 'active';
        }
        $user->update(['status'=>$status]);

        return back()->with('successMsg',"change status to $status successfully");
    }
    // destroy
    public function destroy($id)
    {
        $user =  User::findOrFail($id);
        $user->subscriptions()->delete();
        $user->delete();
        return back()->with('successMsg','deleted succfully');
    }


    // index
    public function search(Request $request)
    {
        $search_word= $request->searchword;
        $all = User::where([['name', 'like', '%' . $search_word . '%'],['type','customer']])->orWhere([['email', 'like', '%' . $search_word . '%'],['type','customer']])->get();
        return view('dashboard.pages.users.index',compact('all','search_word'));
    }
}
