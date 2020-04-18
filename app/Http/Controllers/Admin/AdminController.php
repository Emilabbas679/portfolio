<?php

namespace App\Http\Controllers\Admin;

use App\Models\Career;
use App\Models\Contact;
use App\Models\History;
use App\Models\News;
use App\Models\Partner;
use App\Models\Process;
use App\Models\Service;
use App\Models\Team;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $news_count = News::count();
        $career_count = Career::count();
        $partner_count = Partner::count();
        $member_count = Team::count();
        $process_count = Process::count();
        $service_count = Service::count();
        $history_count = History::count();
        return view('admin.index', compact('user_count', 'news_count', 'career_count', 'partner_count', 'member_count','process_count', 'service_count', 'history_count'));
    }

    public function readMessages()
    {
        Contact::where('is_read', '=', 0)
            ->update(['is_read' => '1']);
        return true;
    }
}
