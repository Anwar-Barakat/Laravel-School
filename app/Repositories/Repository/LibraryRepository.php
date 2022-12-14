<?php

namespace App\Repositories\Repository;

use App\Http\Traits\AttachFileTrait;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Library;
use App\Models\Teacher;
use App\Repositories\Interface\LibraryRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LibraryRepository implements LibraryRepositoryInterface
{
    use AttachFileTrait;

    public function index()
    {
        $library    = Library::latest()->get();
        return view('pages.teachers.library.index', ['library' => $library]);
    }

    public function create()
    {
        $grades     = Grade::all();
        return view('pages.teachers.library.create', ['grades' => $grades]);
    }

    public function store($request)
    {
        if ($request->isMethod('post')) {
            try {
                Library::create([
                    'title'         => $request->title,
                    'file_name'     => $request->file('file_name')->getClientOriginalName(),
                    'grade_id'      => $request->grade_id,
                    'classroom_id'  => $request->classroom_id,
                    'section_id'    => $request->section_id,
                    'teacher_id'    => $this->teacherId(),
                ]);


                $this->uploadFile($request, 'library',  $this->teacherName(),  $this->teacherId(), 'file_name', 'Teacher');

                toastr()->success(__('msgs.added', ['name' => __('trans.book')]));
                return redirect()->back();
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['error' => $th->getMessage()]);
            }
        }
    }

    public function edit($library)
    {
        $grades     = Grade::all();
        return view('pages.teachers.library.edit', ['grades' => $grades, 'library' => $library]);
    }

    public function update($request, $library)
    {
        if ($request->isMethod('put')) {
            try {

                if ($request->hasFile('file_name') && $request->file('file_name')->isValid()) {
                    Image::where([
                        'file_name'         => $library->file_name,
                        'imageable_id'      => Auth::guard('teacher')->user()->id
                    ])->delete();
                    Storage::disk('upload_attachments')->delete('attachments/library/' . $this->teacherName() . '/' . $library->file_name);


                    $this->uploadFile($request, 'library',  $this->teacherName(),  $this->teacherId(), 'file_name', 'Teacher');
                } else
                    $file_name = $library->file_name;


                $library->update([
                    'title'         => $request->title,
                    'file_name'     => $request->file('file_name')->getClientOriginalName(),
                    'grade_id'      => $request->grade_id,
                    'classroom_id'  => $request->classroom_id,
                    'section_id'    => $request->section_id,
                    'teacher_id'    => $this->teacherId(),
                ]);

                toastr()->success(__('msgs.updated', ['name' => __('trans.book')]));
                return redirect()->back();
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors(['error' => $th->getMessage()]);
            }
        }
    }

    public function destroy($library)
    {
        try {
            Image::where([
                'file_name'         => $library->file_name,
                'imageable_id'      => $this->teacherId()
            ])->delete();
            Storage::disk('upload_attachments')->delete('attachments/library/' . $this->teacherName() . '/' . $library->file_name);

            $library->delete();
            toastr()->info(__('msgs.deleted', ['name' => __('trans.book')]));
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    private function teacherName()
    {
        return Auth::guard('teacher')->user()->getTranslation('name', 'en');
    }
    private function teacherId()
    {
        return Auth::guard('teacher')->id();
    }
}