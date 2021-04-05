<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Mapel;
use App\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syllabus = Syllabus::with('kelas', 'mapel')->orderBy('kelas_id', 'asc')->get();
        $kelas    = Kelas::all();
        $mapel    = Mapel::all();
        return view('admin.syllabus.index', compact('syllabus', 'kelas', 'mapel'));
    }

    /**
     * Index Guru
     */
    public function indexGuru()
    {
        $syllabus = Syllabus::with('kelas', 'mapel')->orderBy('kelas_id', 'asc')->get();
        $kelas    = Kelas::all();
        $mapel    = Mapel::all();
        return view('guru.syllabus', compact('syllabus', 'kelas', 'mapel'));
    }

    /**
     * Index Siswa
     */
    public function indexSiswa()
    {
        $syllabus = Syllabus::with('kelas', 'mapel')->orderBy('kelas_id', 'asc')->get();
        $kelas    = Kelas::all();
        $mapel    = Mapel::all();
        return view('siswa.syllabus', compact('syllabus', 'kelas', 'mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'kelas_id'           => 'required',
            'mapel_id'           => 'required',
            'syllabus'           => 'required|mimes:pdf',
            'book_indo_siswa'    => 'required|mimes:pdf',
            'book_english_siswa' => 'required|mimes:pdf',
            'book_indo_guru'     => 'required|mimes:pdf',
            'book_english_guru'  => 'required|mimes:pdf',
        ]);

        $syllabus = $this->moveToPublic($request->file('syllabus'));
        $book_indo_siswa = $this->moveToPublic($request->file('book_indo_siswa'));
        $book_english_siswa = $this->moveToPublic($request->file('book_english_siswa'));
        $book_indo_guru = $this->moveToPublic($request->file('book_indo_guru'));
        $book_english_guru = $this->moveToPublic($request->file('book_english_guru'));

        Syllabus::Create(
            [
                'id' => $request->id,
                'kelas_id' => $request->kelas_id,
                'mapel_id' => $request->mapel_id,
                'syllabus' => $syllabus,
                'book_indo_siswa' => $book_indo_siswa,
                'book_english_siswa' => $book_english_siswa,
                'book_indo_guru' => $book_indo_guru,
                'book_english_guru' => $book_english_guru,
            ]
        );

        // dd($request);

        return redirect()->back()->with('success', 'Data syllabus berhasil ditambahkan!');
    }

    /**
     * move file to public syllabus
     */
    public function moveToPublic($file)
    {
        $fileName = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . "_" . $file->getClientOriginalName();
        $destination = public_path('img/syllabus');
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
        $syllabus = Syllabus::findorfail($id);
        $kelas    = Kelas::all();
        $mapel    = Mapel::all();
        return view('admin.syllabus.edit', compact('syllabus','kelas', 'mapel'));
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
        // dd($request);
        $data = Syllabus::findOrFail($id);

        $this->validate($request, [
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'syllabus' => 'mimes:pdf',
            'book_indo_siswa' => 'mimes:pdf',
            'book_english_siswa' => 'mimes:pdf',
            'book_indo_guru' => 'mimes:pdf',
            'book_english_guru' => 'mimes:pdf',
        ]);

        $oldSyllabus = $data->syllabus;
        $oldBookIndoSiswa = $data->book_indo_siswa;
        $oldBookEnglishSiswa = $data->book_english_siswa;
        $oldBookIndoGuru = $data->book_indo_guru;
        $oldBookEnglishGuru = $data->book_english_guru;

        $data->judul = $request->input('judul');
        $data->kelas_id = $request->input('kelas_id');
        $data->mapel_id = $request->input('mapel_id');

        if ($request->hasFile('syllabus')) {
            $newSyllabus = $this->moveToPublic($request->syllabus);
            // dd($newSyllabus);
            $data->syllabus = $newSyllabus;
            \File::delete(public_path('img/syllabus/'.$oldSyllabus));
        }

        if ($request->hasFile('book_indo_siswa')) {
            $newBookIndoSiswa = $this->moveToPublic($request->book_indo_siswa);
            $data->book_indo_siswa = $newBookIndoSiswa;
            \File::delete(public_path('img/syllabus/'.$oldBookIndoSiswa));
        }

        if ($request->hasFile('book_english_siswa')) {
            $newBookEnglishSiswa = $this->moveToPublic($request->book_english_siswa);
            $data->book_english_siswa = $newBookEnglishSiswa;
            \File::delete(public_path('img/syllabus/'.$oldBookEnglishSiswa));
        }

        if ($request->hasFile('book_indo_guru')) {
            $newBookIndoGuru = $this->moveToPublic($request->book_indo_guru);
            $data->book_indo_guru = $newBookIndoGuru;
            \File::delete(public_path('img/syllabus/'.$oldBookIndoGuru));
        }

        if ($request->hasFile('book_english_guru')) {
            $newBookEnglishGuru = $this->moveToPublic($request->book_english_guru);
            $data->book_english_guru = $newBookEnglishGuru;
            \File::delete(public_path('img/syllabus/'.$oldBookEnglishGuru));
        }

        $data->save();

        // dd($updateData);

        return redirect()->route('syllabus.index')->with('success', 'Data syllabus berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Syllabus::findOrFail($id);
        if ($data->destroy($id)) {
            \File::delete(public_path('img/syllabus/'.$data->syllabus));
            \File::delete(public_path('img/syllabus/'.$data->book_indo_siswa));
            \File::delete(public_path('img/syllabus/'.$data->book_english_siswa));
            \File::delete(public_path('img/syllabus/'.$data->book_indo_guru));
            \File::delete(public_path('img/syllabus/'.$data->book_english_guru));
            return back()->with('success', 'Data syllabus berhasil di hapus');
        }
    }
}
