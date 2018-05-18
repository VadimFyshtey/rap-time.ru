<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\InterviewRequest;
use App\Models\Category;
use App\Models\Interview;
use App\Models\Relationships\CommentInterview;
use App\Models\Relationships\InterviewArtists;
use App\Models\Relationships\RatingInterviews;

class InterviewsController extends DefaultAdminController
{

    public function index()
    {
        $interviews = Interview::orderCreated()->paginate(self::PAGINATION_PAGE);
        return view('admin.interviews.index', compact('interviews'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.interviews.add', compact('categories'));
    }

    public function create(InterviewRequest $request)
    {

        if($request->post()) {
            $interview = new Interview();

            $interview->title = $request->title;
            $interview->short_text = $request->short_text;
            $interview->short_content = $request->short_content;
            $interview->full_content = $request->full_content;
            $interview->alias = $request->alias;
            $interview->category_id = $request->category_id;
            $interview->status = $request->status === 'on' ? 1 : 0;
            $interview->title_seo = $request->title_seo;
            $interview->description_seo = $request->description_seo;

            if(isset($request->image)){
                $path = public_path() . self::INTERVIEWS_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['image']['name']);
                if(move_uploaded_file($_FILES["image"]["tmp_name"],  $path . $name)){
                    $interview->image = $name;
                }
            }

            $interview->save();

            if($interview->id) {

                if(!empty($request->artistInterview)){
                    foreach ($request->artistInterview as $artist) {
                        $interviewArtist = new InterviewArtists();
                        $interviewArtist->interview_id = $interview->id;
                        $interviewArtist->artist_id = $artist;
                        $interviewArtist->save();
                    }
                }

            }

        }
        return redirect()->route('adminInterviewIndex')->with('status', "Интервью {$interview->title} добавлено.");
    }

    public function edit($id)
    {
        $interview = Interview::with('artists')->findOrFail($id);
        $category = Category::where('id', $interview->category_id)->first();
        $categories = Category::all();

        return view('admin.interviews.edit', compact('interview', 'categories', 'category'));
    }

    public function update(InterviewRequest $request, $id)
    {

        if($request->post()){

            $interview = Interview::findOrFail($id);

            $interview->title = $request->title;
            $interview->short_text = $request->short_text;
            $interview->short_content = $request->short_content;
            $interview->full_content = $request->full_content;
            $interview->alias = $request->alias;
            $interview->category_id = $request->category_id;
            $interview->status = $request->status === 'on' ? 1 : 0;
            $interview->title_seo = $request->title_seo;
            $interview->description_seo = $request->description_seo;

            if(isset($request->image)){
                $path = public_path() . self::INTERVIEWS_IMAGE_PATH;
                $name = time() . random_int(8, 30) . $this->getExtension($_FILES['image']['name']);
                if(move_uploaded_file($_FILES["image"]["tmp_name"],  $path . $name)){
                    $interview->image = $name;
                }
            }

            $interview->save();

            if($interview->id) {
                InterviewArtists::where('interview_id', $id)->delete();

                if(!empty($request->artistInterview)){
                    foreach ($request->artistInterview as $artist) {
                        $interviewArtist = new InterviewArtists();
                        $interviewArtist->interview_id = $interview->id;
                        $interviewArtist->artist_id = $artist;
                        $interviewArtist->save();
                    }
                }

            }
        }
        return redirect()->route('adminInterviewIndex')->with('status', "Интервью {$interview->title} обновлено.");
    }

    public function delete($id)
    {
        InterviewArtists::where('interview_id', $id)->delete();
        RatingInterviews::where('interview_id', $id)->delete();
        CommentInterview::where('interview_id', $id)->delete();
        $interview = Interview::findOrFail($id);
        $interview->delete();

        return redirect()->back()->with('status', "Интервью {$interview->title} удалено.");
    }

    public function search($q = null)
    {
        $q = trim(strip_tags($_GET['q']));
        $interviews = Interview::orderCreated()->where('title','LIKE',"%{$q}%")->paginate(self::PAGINATION_PAGE);
        $interviews->appends(['q' => $q]);
        return view('admin.interviews.search', compact('interviews', 'q'));
    }

}
