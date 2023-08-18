<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use Illuminate\Support\Facades\DB;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $channels = Channel::orderBy('ChannelID', 'desc')->paginate(10);
        return view('index', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ChannelName' => 'required',
            'Description' => 'required',
            'SubscribersCount' => 'required',
            'Url' => 'required',
        ]);

        $channels = new Channel();
        $channels->ChannelName = $request->ChannelName;
        $channels->Description = $request->Description;
        $channels->SubscribersCount = $request->SubscribersCount;
        $channels->Url = $request->Url;
        $channels->save();

        return redirect()->route('channels.index')->with('success', 'channel Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $channels = Channel::find($id);

        if ($channels) {
            return view('show', compact('channels'));
        } else {
            return redirect()->route('channels.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Channel $channel)
    {
        return view('edit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Channel $channel)
    {
        $channel->update($request->all());
        return redirect()->route('channels.index')->with('success', 'channel Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();
        return redirect()->route('channels.index')->with('success', 'channel Data deleted successfully');
    }
}
