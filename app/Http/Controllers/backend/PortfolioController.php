<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\ProjectOverview;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    // ===================== SHOW PORTFOLIO PAGE =====================
    public function portfolio()
    {
        $portfolios = Portfolio::with('overviews')->latest()->get();
        return view('backend.portfolio.portfolio', compact('portfolios'));

        
    }

    // ===================== STORE PORTFOLIO =====================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'portfolio_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png',
            'live_link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->portfolio_name = $request->portfolio_name;
        $portfolio->live_link = $request->live_link;
        $portfolio->description = $request->description;

        // ---------- Main Image ----------
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/images/portfolio/'), $imageName);
            $portfolio->image = $imageName;
        }

        // ---------- Gallery Images ----------
        if ($request->hasFile('gallery_images')) {
            $galleryArr = [];
            foreach ($request->file('gallery_images') as $gallery) {
                $gName = rand() . '.' . $gallery->getClientOriginalExtension();
                $gallery->move(public_path('backend/images/portfolio/gallery/'), $gName);
                $galleryArr[] = $gName;
            }
            $portfolio->gallery_images = json_encode($galleryArr);
        }

        $portfolio->save();

        return redirect()->back()->with('success', '✅ Portfolio added successfully!');
    }

    // ===================== STORE PROJECT OVERVIEW =====================
    public function overview(Request $request)
    {
        $request->validate([
            'overview_icon.*' => 'nullable|string|max:255',
            'overview_title.*' => 'nullable|string|max:255',
            'overview_description.*' => 'nullable|string',
        ]);

        if ($request->overview_title) {
            foreach ($request->overview_title as $key => $title) {
                $overview = new ProjectOverview();
                $overview->portfolio_id = $request->portfolio_id ?? null;
                $overview->icon = $request->overview_icon[$key];
                $overview->title = $title;
                $overview->description = $request->overview_description[$key];
                $overview->save();
            }
        }

        return redirect()->back()->with('success', '✅ Overview added successfully!');
    }

    // ===================== EDIT PORTFOLIO =====================
    public function edit($id)
    {
        $portfolio = Portfolio::with('overviews')->findOrFail($id);
        return view('backend.portfolio.edit', compact('portfolio'));
    }

    // ===================== UPDATE PORTFOLIO =====================
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->title = $request->title;
        $portfolio->portfolio_name = $request->portfolio_name;
        $portfolio->live_link = $request->live_link;
        $portfolio->description = $request->description;

        // ---------- Update Main Image ----------
        if ($request->hasFile('image')) {
            if ($portfolio->image && file_exists(public_path('backend/images/portfolio/' . $portfolio->image))) {
                unlink(public_path('backend/images/portfolio/' . $portfolio->image));
            }

            $img = $request->file('image');
            $imageName = rand() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('backend/images/portfolio/'), $imageName);
            $portfolio->image = $imageName;
        }

        $portfolio->save();

        return redirect()->back()->with('success', '✅ Portfolio updated successfully!');
    }

    // ===================== DELETE PORTFOLIO =====================
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // delete main image
        if ($portfolio->image && file_exists(public_path('backend/images/portfolio/' . $portfolio->image))) {
            unlink(public_path('backend/images/portfolio/' . $portfolio->image));
        }

        // delete gallery
        if ($portfolio->gallery_images) {
            foreach (json_decode($portfolio->gallery_images) as $gImage) {
                $path = public_path('backend/images/portfolio/gallery/' . $gImage);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        // delete overviews
        ProjectOverview::where('portfolio_id', $id)->delete();

        $portfolio->delete();

        return redirect()->back()->with('success', '🗑️ Portfolio deleted successfully!');
    }
}
