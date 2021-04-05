<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\LessonPlan;
use App\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessonPlan = LessonPlan::with('kelas', 'mapel')->orderBy('kelas_id', 'asc')->get();

        return view('guru.lessonPlan.index', compact('lessonPlan'));
    }

    /**
     * Index admin
     */
    public function indexAdmin()
    {
        $lessonPlan = LessonPlan::with('kelas', 'mapel')->orderBy('kelas_id', 'asc')->get();

        return view('admin.lessonPlan.index', compact('lessonPlan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas      = Kelas::all();
        $mapel      = Mapel::all();

        return view('guru.lessonPlan.create', compact('kelas', 'mapel'));
    }

    /**
     * Create Admin
     */
    public function createAdmin()
    {
        $kelas      = Kelas::all();
        $mapel      = Mapel::all();

        return view('admin.lessonPlan.create', compact('kelas', 'mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mapel_id'            => 'required',
            'kelas_id'            => 'required',
            'teaching_strategy'   => 'required',
            'metode'              => 'required',
            'hot'                 => 'required',
            'semester'            => 'required',
            'time_alocation'      => 'required',
            'learning_objective'  => 'required',
            'learning_activities' => 'required',
            'assessment'          => 'required',
            'student_book'        => 'required',
            'websik'              => 'required',
            'other'               => 'required',
            'ppt'                 => 'required|mimes:pdf',
            'study_note'          => 'required|mimes:pdf',
            'lks'                 => 'required|mimes:pdf'
        ]);

        $ppt        = $this->moveToPublic($request->file('ppt'));
        $study_note = $this->moveToPublic($request->file('study_note'));
        $lks        = $this->moveToPublic($request->file('lks'));

        LessonPlan::Create(
            [
                'id'                  => $request->id,
                'mapel_id'            => $request->mapel_id,
                'kelas_id'            => $request->kelas_id,
                'teaching_strategy'   => $request->teaching_strategy,
                'metode'              => $request->metode,
                'hot'                 => $request->hot,
                'semester'            => $request->semester,
                'time_alocation'      => $request->time_alocation,
                'learning_objective'  => $request->learning_objective,
                'learning_activities' => $request->learning_activities,
                'assessment'          => $request->assessment,
                'student_book'        => $request->student_book,
                'websik'              => $request->websik,
                'other'               => $request->other,
                'ppt'                 => $ppt,
                'study_note'          => $study_note,
                'lks'                 => $lks
            ]
        );

        return redirect()->route('lessonPlan.guru')->with('success', 'Data Lesson Plan berhasil ditambahkan!');
    }

    /**
     * Store Admin
     */
    public function storeAdmin(Request $request)
    {
        $this->validate($request, [
            'mapel_id'            => 'required',
            'kelas_id'            => 'required',
            'teaching_strategy'   => 'required',
            'metode'              => 'required',
            'hot'                 => 'required',
            'semester'            => 'required',
            'time_alocation'      => 'required',
            'learning_objective'  => 'required',
            'learning_activities' => 'required',
            'assessment'          => 'required',
            'student_book'        => 'required',
            'websik'              => 'required',
            'other'               => 'required',
            'ppt'                 => 'required|mimes:pdf',
            'study_note'          => 'required|mimes:pdf',
            'lks'                 => 'required|mimes:pdf'
        ]);

        $ppt        = $this->moveToPublic($request->file('ppt'));
        $study_note = $this->moveToPublic($request->file('study_note'));
        $lks        = $this->moveToPublic($request->file('lks'));

        LessonPlan::Create(
            [
                'id'                  => $request->id,
                'mapel_id'            => $request->mapel_id,
                'kelas_id'            => $request->kelas_id,
                'teaching_strategy'   => $request->teaching_strategy,
                'metode'              => $request->metode,
                'hot'                 => $request->hot,
                'semester'            => $request->semester,
                'time_alocation'      => $request->time_alocation,
                'learning_objective'  => $request->learning_objective,
                'learning_activities' => $request->learning_activities,
                'assessment'          => $request->assessment,
                'student_book'        => $request->student_book,
                'websik'              => $request->websik,
                'other'               => $request->other,
                'ppt'                 => $ppt,
                'study_note'          => $study_note,
                'lks'                 => $lks
            ]
        );

        return redirect()->route('lessonPlan.indexAdmin')->with('success', 'Data Lesson Plan berhasil ditambahkan!');
    }

    /**
     * move lesson plan to public
     */
    public function moveToPublic($file)
    {
        $fileName = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . "_" . $file->getClientOriginalName();
        $destination = public_path('img/lessonPlan');
        $file->move($destination,$fileName);

        return $fileName;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $lessonPlan = LessonPlan::findorfail($id);
        $kelas    = Kelas::all();
        $mapel    = Mapel::all();
        return view('guru.lessonPlan.edit', compact('lessonPlan','kelas', 'mapel'));
    }

    /**
     * Edit Admin
     */
    public function editAdmin($id)
    {
        $id = Crypt::decrypt($id);
        $lessonPlan = LessonPlan::findorfail($id);
        $kelas    = Kelas::all();
        $mapel    = Mapel::all();
        return view('admin.lessonPlan.edit', compact('lessonPlan','kelas', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = LessonPlan::findOrFail($id);

        $this->validate($request, [
            'mapel_id'            => 'required',
            'kelas_id'            => 'required',
            'teaching_strategy'   => 'required',
            'metode'              => 'required',
            'hot'                 => 'required',
            'semester'            => 'required',
            'time_alocation'      => 'required',
            'learning_objective'  => 'required',
            'learning_activities' => 'required',
            'assessment'          => 'required',
            'student_book'        => 'required',
            'websik'              => 'required',
            'other'               => 'required',
            'ppt'                 => 'mimes:pdf',
            'study_note'          => 'mimes:pdf',
            'lks'                 => 'mimes:pdf'
        ]);

        $oldPpt = $data->ppt;
        $oldStudyNote = $data->study_note;
        $oldlks = $data->lks;

        $data->mapel_id            = $request->input('mapel_id');
        $data->kelas_id            = $request->input('kelas_id');
        $data->teaching_strategy   = $request->input('teaching_strategy');
        $data->metode              = $request->input('metode');
        $data->hot                 = $request->input('hot');
        $data->semester            = $request->input('semester');
        $data->time_alocation      = $request->input('time_alocation');
        $data->learning_objective  = $request->input('learning_objective');
        $data->learning_activities = $request->input('learning_activities');
        $data->assessment          = $request->input('assessment');
        $data->student_book        = $request->input('student_book');
        $data->websik              = $request->input('websik');
        $data->other               = $request->input('other');

        if ($request->hasFile('ppt')) {
            $newPpt = $this->moveToPublic($request->ppt);
            // dd($newSyllabus);
            $data->ppt = $newPpt;
            \File::delete(public_path('img/lessonPlan/'.$oldPpt));
        }

        if ($request->hasFile('study_note')) {
            $newStudyNote = $this->moveToPublic($request->study_note);
            $data->study_note = $newStudyNote;
            \File::delete(public_path('img/lessonPlan/'.$oldStudyNote));
        }

        if ($request->hasFile('lks')) {
            $newLks = $this->moveToPublic($request->lks);
            $data->lks = $newLks;
            \File::delete(public_path('img/lessonPlan/'.$oldlks));
        }

        $data->save();

        // dd($updateData);

        return redirect()->route('lessonPlan.guru')->with('success', 'Data Lesson Plan berhasil diperbarui!');
    }

    /**
     * Update Admin
     */
    public function updateAdmin(Request $request, $id)
    {
        $data = LessonPlan::findOrFail($id);

        $this->validate($request, [
            'mapel_id'            => 'required',
            'kelas_id'            => 'required',
            'teaching_strategy'   => 'required',
            'metode'              => 'required',
            'hot'                 => 'required',
            'semester'            => 'required',
            'time_alocation'      => 'required',
            'learning_objective'  => 'required',
            'learning_activities' => 'required',
            'assessment'          => 'required',
            'student_book'        => 'required',
            'websik'              => 'required',
            'other'               => 'required',
            'ppt'                 => 'mimes:pdf',
            'study_note'          => 'mimes:pdf',
            'lks'                 => 'mimes:pdf'
        ]);

        $oldPpt = $data->ppt;
        $oldStudyNote = $data->study_note;
        $oldlks = $data->lks;

        $data->mapel_id            = $request->input('mapel_id');
        $data->kelas_id            = $request->input('kelas_id');
        $data->teaching_strategy   = $request->input('teaching_strategy');
        $data->metode              = $request->input('metode');
        $data->hot                 = $request->input('hot');
        $data->semester            = $request->input('semester');
        $data->time_alocation      = $request->input('time_alocation');
        $data->learning_objective  = $request->input('learning_objective');
        $data->learning_activities = $request->input('learning_activities');
        $data->assessment          = $request->input('assessment');
        $data->student_book        = $request->input('student_book'); 
        $data->websik              = $request->input('websik');
        $data->other               = $request->input('other');

        if ($request->hasFile('ppt')) {
            $newPpt = $this->moveToPublic($request->ppt);
            // dd($newSyllabus);
            $data->ppt = $newPpt;
            \File::delete(public_path('img/lessonPlan/'.$oldPpt));
        }

        if ($request->hasFile('study_note')) {
            $newStudyNote = $this->moveToPublic($request->study_note);
            $data->study_note = $newStudyNote;
            \File::delete(public_path('img/lessonPlan/'.$oldStudyNote));
        }

        if ($request->hasFile('lks')) {
            $newLks = $this->moveToPublic($request->lks);
            $data->lks = $newLks;
            \File::delete(public_path('img/lessonPlan/'.$oldlks));
        }

        $data->save();

        // dd($updateData);

        return redirect()->route('lessonPlan.indexAdmin')->with('success', 'Data Lesson Plan berhasil diperbarui!');
    }

    /**
     * Destroy Admin
     */
    public function destroyAdmin($id)
    {
        $data = LessonPlan::findOrFail($id);
        if ($data->destroy($id)) {
            \File::delete(public_path('img/lessonPlan/'.$data->ppt));
            \File::delete(public_path('img/lessonPlan/'.$data->study_note));
            \File::delete(public_path('img/lessonPlan/'.$data->lks));
            return back()->with('success', 'Data Lesson Plan berhasil di hapus');
        }
    }
}
