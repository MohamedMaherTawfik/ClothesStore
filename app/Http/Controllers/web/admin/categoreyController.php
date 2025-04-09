<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoreyRequest;
use App\Services\categoreyServices;
use Illuminate\Http\Request;

class categoreyController extends Controller
{
    private $categoreyServices;

    public function __construct(categoreyServices $categoreyServices)
    {
        $this->categoreyServices = $categoreyServices;
    }

    public function index()
    {
        $allCategories = $this->categoreyServices->getAllCategorey();
        return view('admin.categorey.index', compact('allCategories'));
    }

    public function create()
    {
        return view('admin.categorey.create');
    }

    public function store(categoreyRequest $request)
    {
        $fields = $request->validated();
        // Handle file upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Store the file in the 'uploads' directory within the storage folder
            $file = $request->file('image');
            $name=time().'.'.$file->getClientOriginalName();
            $file->move(public_path('categorey'), $name);
            $fields['image']=$name;
            $this->categoreyServices->storeCategorey($fields);
            return redirect('/dashboard/category')->with('success', 'categorey Created Successfully!');
        }

        return back()->withErrors(['file' => 'There was an issue with the file upload.']);
    }



    public function edit()
    {
        $categorey = $this->categoreyServices->showCategorey(request('id'));
        return view('admin.categorey.edit')->with('categorey', $categorey);
    }

    public function update(categoreyRequest $request)
    {
        $fields = $request->validated();
        $categorey = $this->categoreyServices->updateCategorey($fields, request('id'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('categorey'), $name);
            $fields['image'] = $name;
        }
        return redirect()->route('categorey')->with('success', __('messages.update_Message'))->with('categorey', $categorey);
    }

    public function delete()
    {
        $categorey = $this->categoreyServices->deleteCategorey(request('id'));
        return redirect()->route('categorey')->with('success', __('messages.destroy_Message'))->with('categorey', $categorey);
    }
}
