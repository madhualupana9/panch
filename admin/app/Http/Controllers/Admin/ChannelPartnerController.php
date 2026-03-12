<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChannelPartner;
use Illuminate\Http\Request;

class ChannelPartnerController extends Controller
{
    public function index()
    {
        $partners = ChannelPartner::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.channel-partners.index', compact('partners'));
    }

    public function show(ChannelPartner $channelPartner)
    {
        if (!$channelPartner->read_at) {
            $channelPartner->update(['read_at' => now(), 'status' => 'read']);
        }
        return view('admin.channel-partners.show', compact('channelPartner'));
    }

    public function destroy(ChannelPartner $channelPartner)
    {
        $channelPartner->delete();
        return redirect()->route('admin.channel-partners.index')->with('success', 'Channel Partner deleted successfully!');
    }
}
