<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use App\Models\User;
use App\Models\Events;


use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        if ($request->ajax()) {


            $data = User::where('id', 'like', '%' . $request->search . '%')
                ->orwhere('name', 'like', '%' . $request->search . '%')
                ->orwhere('email', 'like', '%' . $request->search . '%')
               ->get();


            $blog_data = Blogs::where('id', 'like', '%' . $request->search . '%')
                ->orwhere('title', 'like', '%' . $request->search . '%')
                ->get();


            $event_data = Events::where('id', 'like', '%' . $request->search . '%')
                ->orwhere('name', 'like', '%' . $request->search . '%')
                ->orwhere('description', 'like', '%' . $request->search . '%')
                ->get();


            return $data;



//            $output = '';
//            if (count($data) > 0) {
//
//                $output = '
//            <table class="table">
//            <thead>
//            <tr>
//                <th scope="col">#</th>
//                <th scope="col">Name</th>
//                <th scope="col">Email</th>
//            </tr>
//            </thead>
//            <tbody>';
//
//                foreach ($data as $row) {
//                    $output .= '
//                    <tr>
//                    <th scope="row">' . $row->id . '</th>
//                    <td>' . $row->name . '</td>
//                    <td>' . $row->email . '</td>
//                    </tr>
//                    ';
//                }
//
//
//                $output .= '
//             </tbody>
//            </table>';

//
//            } else {
//
//                $output .= 'No results';
//
//            }



        }

    }
}
