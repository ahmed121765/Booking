<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateHeroSection;
use App\Models\heroes;
use App\Traits\FileHandler;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    use FileHandler;

    public function __construct()
    {
        $this->middleware(['permission:section index'])->only('index');
        $this->middleware(['permission:section update'])->only('update');
    }
    public function index()
    {
        $banner = heroes::first();
        return view('dashboard.hero.index', [
            'banner' => $banner
        ]);
    }

    public function update(UpdateHeroSection $request)
    {
        $banner = heroes::first() ?? new heroes();
        $oldImage = $banner->bg_image;

        $data = $request->validated();
        $data['bg_image'] = $this->uploadFile($request, 'bg_image', $oldImage, 'uploads');
        $banner->fill($data)->save();
        return redirect()->back()->with('success', 'updated successfully.');
    }
}