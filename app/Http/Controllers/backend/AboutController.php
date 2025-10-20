<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Skill;
use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function adminAbout()
    {
        $about = About::first(); // assuming only one about record
        $skills = Skill::all();

        return view('backend.about.about', compact('about', 'skills'));
    }

    // ================= Update About =================
    public function update(Request $request)
    {
        $about = About::first(); // assuming single record

        if (!$about) {
            $about = new About();
        }

        $about->title = $request->title;
        $about->description_bio = $request->description_bio;

        // Profile picture
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('backend/images/about/'), $filename);

            // Delete old file if exists
            if ($about->profile_picture && file_exists(public_path('backend/images/about/' . $about->profile_picture))) {
                unlink(public_path('backend/images/about/' . $about->profile_picture));
            }

            $about->profile_picture = $filename;
        }

        // CV file
        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('backend/files/cv/'), $filename);

            // Delete old CV
            if ($about->cv_link && file_exists(public_path('backend/files/cv/' . $about->cv_link))) {
                unlink(public_path('backend/files/cv/' . $about->cv_link));
            }

            $about->cv_link = $filename;
        }

        $about->save();

        return redirect()->back()->with('success', 'About section updated successfully!');
    }

    // ================= Skill Store / Update =================
    public function skillStore(Request $request)
    {
        $skills = $request->input('skills', []);

        foreach ($skills as $key => $data) {
            if (isset($data['name']) && !empty($data['name'])) {
                if (isset($data['id'])) {
                    // Update existing skill
                    $skill = Skill::find($data['id']);
                    if (!$skill) continue;
                } else {
                    // New skill
                    $skill = new Skill();
                }

                $skill->name = $data['name'];
                $skill->progress = $data['progress'] ?? 0;
                $skill->description = $data['description'] ?? null;
                $skill->save();
            }
        }

        return redirect()->back()->with('success', 'Skills updated successfully!');
    }

    // ================= Skill Delete =================
    public function skillDelete($id)
    {
        $skill = Skill::find($id);
        if ($skill) {
            $skill->delete();
        }

        return redirect()->back()->with('success', 'Skill deleted successfully!');
    }
}

