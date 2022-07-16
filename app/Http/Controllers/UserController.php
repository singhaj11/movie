<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $query = $this->model->query();
        if (isset($request->keyword) && $request->keyword != null) {
            $query->whereRaw(" LOWER(CONCAT_WS(' ', name)) LIKE LOWER('%" . (trim($request->keyword)) . "%')");
        }
        if (isset($request->from) && isset($request->to)) {
            $from = Carbon::createFromFormat('Y-m-d H:i:s', $request->from . ' 00:00:00');
            $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->to . ' 23:59:00');
            // $query->whereHas('favourites', function ($q) use ($from, $to) {
            //     $q->whereHas('favouriteable', function ($q) use($from, $to) {
            //         $q->whereBetween('release_date', [$from, $to]);
            //     });
            // });
            $items = $query->where('role', '!=', 1)->with('favourites.favouriteable', function ($q) use ($from, $to) {
                $q->whereBetween('release_date', [$from, $to]);
            })->latest()->paginate()->withQueryString();
        } else {
            $items = $query->where('role', '!=', 1)->with('favourites.favouriteable')->latest()->paginate()->withQueryString();
        }
        return view('admin.user.index', compact('items'));
    }
}
